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

.card {
    background-color: rgba(234, 232, 231) !important;
}

.card-block {
    background-color: rgba(234, 232, 231);
}
</style>

<body>

    <div class="container">
        @foreach($anuncios as $anuncio)
            @if($loop->first == false && $anuncios[$loop->index -1]['data_boleia'] != $anuncio->data_boleia)
                <!-- data diferente -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="heading">
                        <h5 class="mb-0">
                            <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse"
                                aria-expanded="false" aria-controls="collapse">
                                Data boleia: {{$anuncio->data_boleia}}
                               
                            </a>
                        </h5>
                    </div>
                    <div id="collapse" class="collapse" role="tabpanel" aria-labelledby="heading">
                        <div class="card-block">
                            <div class="container">
                                <form action="{{ route('anuncio.show', $anuncio->id) }}">
                                        <button  class="btn btn-primary ">
                                            Para: {{$anuncio->destino}}
                                        </button>
                                </form>
                            
                
            @elseif($loop->first)
                    
                <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="heading">
                            <h5 class="mb-0">
                                <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse"
                                    aria-expanded="false" aria-controls="collapse">
                                    Data boleia: {{$anuncio->data_boleia}}
                                
                                </a>
                            </h5>
                        </div>
                        <div id="collapse" class="collapse" role="tabpanel" aria-labelledby="heading">
                            <div class="card-block">
                                <div class="container">
                                    <form action="{{ route('anuncio.show', $anuncio->id) }}">
                                            <button  class="btn btn-primary ">
                                                Para: {{$anuncio->destino}}
                                            </button>
                                    </form>
                    
                               
                    
            @else
           
        
                        <form action="{{ route('anuncio.show', $anuncio->id) }}">
                                <button  class="btn btn-primary ">
                                    Para: {{$anuncio->destino}}
                                </button>
                        </form>
            @endif
        
        @endforeach
        {{ $anuncios->links() }}
    </div>


    

</body>


@endsection