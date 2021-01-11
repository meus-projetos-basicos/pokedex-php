@extends('main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                @foreach($lista->pokemon_entries as $pokemon)
                    <ul>
                        <li>name: {{  $pokemon->pokemon_species->name }}</li>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="/assets/js/vue.js"></script>
    <script>
        $.ajax({
            url: `https://pokeapi.co/api/v2/pokedex/1`,
            type: 'GET',
            success: function(data) {
                $('#pokemons').empty();
                $.each(data, function (index, value) {
                    $('#pokemons').append('<div class="card"> +index+ : +value+ </div>')
                })
            },
        })
    </script>
@endpush
