@extends('main')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-8 mt-4 mb-4">

                <div class="card">
                    <div class="card-body">
                        <form class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">Sear</label>
                                <input class="form-control" name="filter"
                                       id="inputPassword2" placeholder="Pesquisar">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                        </form>

                        {{ $lista->links() }}
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
                                    <td><a href="{{ route('pokemon.detail', $pokemon['entry_number']) }}" class="btn btn-primary">Ver mais</a></td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        {{ $lista->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .esquerda {
            flex: 1;
        }

        .direita {
            width: 70%;
        }
    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush
