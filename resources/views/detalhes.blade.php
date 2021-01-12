@extends('main')

@section('title', 'Detalhe')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card bg-danger mb-2">
                    <div class="card-body border-dark">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="card m-2">
                                    <img class="img-responsive card-img-top"
                                         src="{{ $retorno['sprites']['other']['official-artwork']['front_default'] }}"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h2 class="text-capitalize">{{ $retorno['name'] }}</h2>

                                        @foreach($retorno['types'] as $tipo)
                                            <button class="btn btn-sm progressColor text-white">{{ ($tipo['type']['name']) }}</button>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="card m-2">
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
                                        <div class="card m-2">
                                            <div class="card-body">
                                                <h4>Habilidades:</h4>
                                                @foreach($retorno['abilities'] as $habilidade)
                                                    <p>{{ $habilidade['ability']['name'] }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card m-2">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{--@push('css')--}}
{{--    <style>--}}
{{--        .marcaAgua{--}}
{{--            margin: 10px;--}}
{{--            background:url("https://image.flaticon.com/icons/png/512/188/188918.png") no-repeat;--}}
{{--            background-size: contain;--}}
{{--            filter:alpha(opacity=80);--}}
{{--            filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0.2);--}}
{{--            opacity:.50;--}}
{{--        }--}}

{{--    </style>--}}
{{--@endpush--}}


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

