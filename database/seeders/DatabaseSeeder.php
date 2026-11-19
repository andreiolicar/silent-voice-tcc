<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ProjectRecordSeeder::class);

        if (app()->environment('local')) {
            User::unguarded(fn () => User::firstOrCreate(
                ['email' => 'admin@silentvoice.test'],
                ['name' => 'Equipe Silent Voice', 'password' => 'SilentVoice123!', 'is_admin' => true],
            ));
        }
    }
}
