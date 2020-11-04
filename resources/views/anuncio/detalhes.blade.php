@extends('layouts.app')
@section('content')
<style>
body {
    height: 1000px;
    background-color: blue;
    /* For browsers that do not support gradients */
    background-image: radial-gradient(#5F9EA0, #00008B);
    /* Standard syntax (must be last) */
}
</style>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">info</div>

                    <div class="card-body">
                        <form method="Post" action="{{ route('passageiro.store') }}" id="criarPassageiroForm">
                            @csrf
                            <input type="hidden" value="{{$anuncio->id}}" name="idanuncio">
                            <p> data boleia: {{ $anuncio->data_boleia }}</p>

                            <p>destino: {{ $anuncio->destino }}</p>

                            <p>origem: {{ $anuncio->origem }}</p>

                            <p>carro: {{ $mcarro }}</p>

                            <p>telefone: {{$tele}}</p>

                            @if(\Auth::id() != $idcond)
                            @if($disponivel > 0)
                            <button id="aceitar">aceitar Viagem</button>
                            @elseif($disponivel == -1)
                            <p> Ja estas na viagem</p>
                            @else
                            <p>viagem completa</p>
                            @endif
                            @else
                            <p> Es o condutor</p>


                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header">Passageiros</div>
                                            
                                            <div class="card-body">
                                                    @forelse($passagerDetails as $passDetails)
                                                <p>nome: {{ $passDetails->name }} </p>
                                                <p>contacto: {{ $passDetails->contacto }} </p>
                                                @empty
                                                <p>A viagem não tem passageiros</p>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </form>
                        @if(\Auth::id() != $idcond)
                        @if($disponivel == -1)
                        <form action="{{ route('passageiro.destroy', \Auth::id())}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>cancelar</button>
                        </form>
                        @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-left">
            <div class="col-md-5">
                <img>
            </div>
        </div>
    </div>


</body>


@endsection