@extends('layouts.app')
@section('content')
<style>
body {
    height: 1000px;
    background-color: blue;
    /* For browsers that do not support gradients */
    background-image:radial-gradient( #5F9EA0, #00008B);
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
                        <p> data boleia: {{ $viagem->data_boleia }}</p>

                        <p>destino: {{ $viagem->destino }}</p>

                        <p>origem: {{ $viagem->origem }}</p>

                        <p>carro: {{ (\App\carro::find($viagem->carro))->matricula }}</p>
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

</html>

@endsection