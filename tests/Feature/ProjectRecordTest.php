<?php

namespace Tests\Feature;

use App\Models\ProjectRecord;
use App\Models\User;
use Database\Seeders\ProjectRecordSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectRecordTest extends TestCase
{
    use RefreshDatabase;

    private array $record = [
        'title' => 'Teste de integração dos sinais',
        'category' => 'Metodologia',
        'summary' => 'Plano do teste de integração do protótipo.',
        'body' => 'A equipe vai comparar os sinais com e sem contexto sonoro.',
    ];

    public function test_admin_can_create_a_record(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]))
            ->post(route('records.store'), $this->record)
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('project_records', $this->record);
    }

    public function test_visitors_can_read_a_record_and_members_can_list_it_in_the_dashboard(): void
    {
        $record = ProjectRecord::create($this->record);

        $this->get(route('home'))->assertOk()->assertSee($record->title);
        $this->get(route('records.show', $record))->assertOk()->assertSee($record->body);

        $this->actingAs(User::factory()->create())
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee($record->title)
            ->assertDontSee('Novo registro');
    }

    public function test_admin_can_update_a_record(): void
    {
        $record = ProjectRecord::create($this->record);
        $updated = array_replace($this->record, ['title' => 'Integração revisada']);

        $this->actingAs(User::factory()->create(['is_admin' => true]))
            ->patch(route('records.update', $record), $updated)
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('project_records', ['id' => $record->id, ...$updated]);
    }

    public function test_admin_can_delete_a_record(): void
    {
        $record = ProjectRecord::create($this->record);

        $this->actingAs(User::factory()->create(['is_admin' => true]))
            ->delete(route('records.destroy', $record))
            ->assertRedirect(route('dashboard'));

        $this->assertModelMissing($record);
        $this->get(route('records.show', $record))->assertNotFound();
    }

    public function test_guest_and_member_cannot_modify_the_acervo(): void
    {
        $record = ProjectRecord::create($this->record);
        $this->get(route('dashboard'))->assertRedirect(route('login'));
        $this->post(route('records.store'), $this->record)->assertRedirect(route('login'));

        $this->actingAs(User::factory()->create());
        $this->get(route('records.create'))->assertForbidden();
        $this->get(route('records.edit', $record))->assertForbidden();
        $this->post(route('records.store'), $this->record)->assertForbidden();
        $this->patch(route('records.update', $record), $this->record)->assertForbidden();
        $this->delete(route('records.destroy', $record))->assertForbidden();
        $this->assertModelExists($record);
    }

    public function test_admin_submissions_are_validated(): void
    {
        ProjectRecord::create($this->record);

        $this->actingAs(User::factory()->create(['is_admin' => true]))
            ->post(route('records.store'), ['title' => $this->record['title'], 'category' => 'Inválida'])
            ->assertSessionHasErrors(['title', 'category', 'summary', 'body']);

        $this->assertDatabaseCount('project_records', 1);
    }

    public function test_seeder_populates_ten_records_without_duplicates(): void
    {
        $this->seed(ProjectRecordSeeder::class);
        $this->assertDatabaseCount('project_records', 10);

        $this->seed(ProjectRecordSeeder::class);
        $this->assertDatabaseCount('project_records', 10);
    }

    public function test_unknown_route_returns_the_custom_fallback(): void
    {
        $this->get('/pagina-inexistente')
            ->assertNotFound()
            ->assertSee('Página não encontrada');
    }
}
