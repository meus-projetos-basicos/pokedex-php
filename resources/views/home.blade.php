@extends('main')



@section('content')

    <div class="areaTotal">
        <div class="ladoEsquerdo">

            <div class="content-home">
                <h2 class="text-white">Pokédex</h2>
            </div>
        </div>
        <div class="ladoDireito">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="card mt-2 mb-2" style="width: 100%; height: 600px; overflow-y: scroll">
                            <div class="card-body">
                                <form method="Post" action="{{ route('busca.pokemon') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-md-10">
                                            <div class="form-group">
                                                <input class="form-control" name="filter" placeholder="Pesquisar">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <button type="submit" class="btn btn-primary btn-sm btn-md">Buscar</button>
                                        </div>
                                    </div>
                                </form>

                                <table class="table table-responsive-sm table-responsive-md">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" style="width: 120px">Ação</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lista->items() as $pokemon)
                                        <tr>
                                            <td>{{ $pokemon['entry_number'] }}</td>
                                            <td>{{ $pokemon['pokemon_species']['name'] }}</td>
                                            <td><a href="{{ route('pokemon.detail', $pokemon['entry_number']) }}"
                                                   class="btn btn-primary">Ver mais</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>

                                <div class="btn-group float-right" role="group" aria-label="Basic example">
                                    <p class="ml-2">{{ $lista->currentPage() }} - {{ $lista->perPage() }} / {{ $lista->total() }}</p>

                                    <a href="?page=1" class="btn btn-sm ml-2" title="Primeira página">
                                        <i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>
                                    </a>
                                    <a href="?page={{$previousPage}}" class="btn btn-sm ml-2" title="Voltar página">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>

                                    <a href="?page={{$nextPage}}" class="btn btn-sm ml-2" title="Próxima página">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                    <a href="?page={{ $lista->lastPage() }}" class="btn btn-sm ml-2" title="Última página">
                                        <i class="fas fa-chevron-right justify-content-center"></i><i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')

    <link rel="stylesheet" href="/assets/css/home.css">

@endpush

@push('js')
    <script>

    </script>
@endpush
