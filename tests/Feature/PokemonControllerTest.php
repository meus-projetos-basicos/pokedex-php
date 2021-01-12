<?php

namespace Tests\Feature;

use Tests\TestCase;

class PokemonControllerTest extends TestCase
{
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

}
