@extends('main')

@section('title', 'Detalhe')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="card">
                                    <img class="img-responsive card-img-top m-2"
                                         src="{{ $retorno['sprites']['other']['official-artwork']['front_default'] }}"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h2 class="text-capitalize">{{ $retorno['name'] }}</h2>

                                        @foreach($retorno['types'] as $tipo)
                                            <button class="btn btn-sm">{{ $tipo['type']['name'] }}</button>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4>Características</h4>
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <p><strong>Espécie:</strong> {{ $retorno['species']['name'] }}
                                                        </p>
                                                        <p>
                                                            <strong>Experiência:</strong> {{ $retorno['base_experience'] }}
                                                        </p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <p>
                                                            <strong>Altura:</strong> {{ $retorno['height'] }} cm
                                                        </p>
                                                        <p>
                                                            <strong>Peso:</strong> {{ $retorno['weight'] }} kg
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4>Habilidades:</h4>
                                                @foreach($retorno['abilities'] as $habilidade)
                                                    <p>{{ $habilidade['ability']['name'] }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Estatísticas</h4>
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                @foreach($retorno['stats'] as $estatisca)
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>{{ $estatisca['stat']['name'] }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="progress mb-2">

                                                                <div
                                                                    class="progress-bar progressColor"
                                                                    role="progressbar"
                                                                    style="width: {{ $estatisca['base_stat'] }}%"
                                                                    aria-valuenow="25"
                                                                    aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h2>Evolução</h2>

                                        @foreach($evolution['chain']['evolves_to'] as $segundaEvolucao)
                                            @foreach($segundaEvolucao['evolves_to'] as $terceiraEvolucao)

                                                <div class="row">
                                                    <div class="col-12 col-md-4">
                                                        <div style="background-color: #fff; border: 2px solid black; border-radius: 100%; width: 100px" >
                                                            <img class="img-responsive card-img-top m-2"
                                                                 src="#"
                                                                 alt="Card image cap">
                                                        </div>
                                                        <h4>{{ $evolution['chain']['species']['name'] }}</h4>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <h4>{{ $segundaEvolucao['species']['name'] }}</h4>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <h4>{{ $terceiraEvolucao['species']['name'] }}</h4>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('js')
    <script>
        $(".progressColor").each(function () {
            var hue = 'rgb(' + (Math.floor((28 - 255) * Math.random()) + 200) + ','
                + (Math.floor((28 - 255) * Math.random()) + 200) + ','
                + (Math.floor((28 - 255) * Math.random()) + 200) + ')';
            $(this).css("background-color", hue);
        });
    </script>
@endpush

