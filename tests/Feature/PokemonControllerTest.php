<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PokemonControllerTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testIndex()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testPokemonDetail()
    {
        $response = $this->get('/pokemon/25');

        $response->assertStatus(200);
    }

    public function testPokemonSearch()
    {
        $response = $this->postJson('/search', [
            'filter' => 'Pikachu'
        ]);

        $response->assertStatus(200);
    }
}
