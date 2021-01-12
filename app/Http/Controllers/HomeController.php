<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchFormRequest;
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

    public function consultaApi(SearchFormRequest $request)
    {
        $client = $this->getApi();
        $filtro = strtolower($request->filter);
        $response = $client->request('get', "api/v2/pokemon/$filtro");
        $retorno = json_decode($response->getBody()->getContents(), true);


        return view('detalhes', [
            'retorno' => $retorno,
        ]);
    }

    public function pokemonDetail($id)
    {
        $client = $this->getApi();
        $response = $client->request('get', "api/v2/pokemon/$id");
        $retorno = json_decode($response->getBody()->getContents(), true);

        return view('detalhes', [
            'retorno' => $retorno,
        ]);
    }
}
