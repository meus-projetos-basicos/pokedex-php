<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function getPokemons()
    {
//        $lista = Http::get('https://pokeapi.co/api/v2/pokedex/1');

        $client = new Client([
           'base_uri' => 'https://pokeapi.co/',
            'timeout' => 2.0
        ]);
        $response = $client->request('get', 'api/v2/pokedex/1');
        $lista = $response->getBody()->getContents();

        return view('home', [
            'lista' => $lista
        ]);
    }

    public function index()
    {
        return view('home');
    }
}
