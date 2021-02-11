@extends('main')

@section('title', 'Detalhe' | $retorno['name'])

@section('icone', $retorno['sprites']['other']['official-artwork']['front_default'])

@section('content')

    <div class="areaTotal">
        <div class="ladoEsquerdo">
            <div class="container">
                <div class="row">
                    <div class="col-12 desktop">
                        <img src="{{ $retorno['sprites']['other']['official-artwork']['front_default'] }}" alt="">
                        <h1 class="text-capitalize text-center">{{ $retorno['species']['name'] }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="linha-vertical">
            <div class="circulo"></div>
        </div>

        <div class="ladoDireito">
            <div class="container m-2">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10" style="height: 600px; overflow-y: scroll">
                        <div class="card card-mobile">
                            <div class="card-body mt-2">
                                <img class="img-responsive" style="width: 250px" src="{{ $retorno['sprites']['other']['official-artwork']['front_default'] }}" alt="">
                                <h1 class="text-capitalize text-center">{{ $retorno['name'] }}</h1>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <h4>Características</h4>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a class="btn btn-primary btn-sm float-right" href="{{ route('home') }}">Página Principal</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4>Detalhes</h4>
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-1">
                                        <p><strong>Espécie:</strong> {{ $retorno['species']['name'] }}
                                        </p>
                                        <p>
                                            <strong>Experiência:</strong> {{ $retorno['base_experience'] }}
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-6 mb-1">
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
                        <div class="card">
                            <div class="card-body">
                                <h4>Habilidades:</h4>
                                <div class="row">
                                    @foreach($retorno['abilities'] as $habilidade)
                                        <div class="col-12 col-md-6 justify-content-between">
                                            <p>{{ $habilidade['ability']['name'] }}</p>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4>Estatísticas</h4>
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        @foreach($retorno['stats'] as $estatisca)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="text-uppercase">{{ $estatisca['stat']['name'] }}</p>
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
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" href="/assets/css/detalhe.css">
@endpush


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

