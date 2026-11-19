<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_home_page_handles_an_empty_archive(): void
    {
        $this->get('/')->assertOk()->assertSee('O acervo está vazio.');
    }
}
