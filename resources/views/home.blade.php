@extends('main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8 mt-4 mb-4">

                <div class="card">
                    <div class="card-body">
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

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('js')

@endpush
