@extends('main')

@section('content')

    <div class="planoFundo">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 mt-4 mb-4 ">
                    @include('includes.alert')

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 mt-2 mb-2">
                                    <form class="form-inline" action="{{ route('pokemon.filter') }}" method="Post">
                                        @csrf

                                        <input
                                            type="text"
                                            class="form-control mr-2"
                                            placeholder="Qual pokemon você deseja pesquisar?"
                                            name="filter">
                                        <button type="submit" class="btn btn-sm btn-primary">Pesquisar</button>
                                    </form>
                                </div>
                                <div class="col-12 col-md-12">
                                    <table class="table">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Ação</th>
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
                                </div>
                            </div>
                            {{ $lista->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push("css")
    <style>
        .planoFundo {
            /*background-image: url('https://c4.wallpaperflare.com/wallpaper/585/452/950/pokemon-pokeballs-anime-minimalism-wallpaper-thumb.jpg');*/
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endpush

@push('js')

@endpush
