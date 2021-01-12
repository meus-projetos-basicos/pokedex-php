<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    function paginator_instance($items, $requests = [], $perPage = 5, $currentPage = null, array $options = [])
    {
        $perPage = $perPage;

        $page = $currentPage ? $currentPage : \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();

        $currentPageSearchResults = collect($items)->slice(($page - 1) * $perPage, $perPage)->all();

        $paginator = (new \Illuminate\Pagination\LengthAwarePaginator($currentPageSearchResults, count($items), $perPage, $page, $options >= 1
            ? $options
            : [
                'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ])
        );

        return $paginator->appends($requests);
    }

    private function getApi()
    {
        return $client = new Client([
            'base_uri' => 'https://pokeapi.co/',
            'timeout' => 2.0
        ]);
    }

    public function index()
    {
        /**
         * @var LengthAwarePaginator
         */
        $client = $this->getApi();
        $response = $client->request('get', 'api/v2/pokedex/1');
        $lista = json_decode($response->getBody()->getContents(), true);
        $retorno = $this->paginator_instance($lista['pokemon_entries']);

        return view('home', [
            'lista' => $retorno
        ]);
    }

    public function consultaApi(Request $request)
    {
        $client = $this->getApi();
        $response = $client->request(
            'post',
            'api/v2/pokedex/1',
            [
                'content-type' => 'application/json'
            ],
        );
        $lista = json_decode($response->getBody()->getContents(), true);

        if ($request->filter) {
            dd($request->filter);
            foreach ($lista['pokemon_entries'] as $pokemon) {
                $lista->where($pokemon['pokemon_species']['name'], 'LIKE', "%{$request->filter}%");
            }
        }
        $result = $request->get();

        return view('lista', ['lista' => $result]);
    }

    public function pokemonDetail($id)
    {
        $client = $this->getApi();
        $response = $client->request('get', "api/v2/pokemon/$id");
        $retorno = json_decode($response->getBody()->getContents(), true);

        $getEvolution = $client->request('get', "api/v2/evolution-chain/$id");
//        apagar esse comentário
        $evolution = json_decode($getEvolution->getBody()->getContents(), true);

        return view('detalhes', [
            'retorno' => $retorno,
            'evolution' => $evolution
        ]);
    }
}
