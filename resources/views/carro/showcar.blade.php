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
                        <p> matricula: {{ $carro->matricula }}</p>

                        <p>lugares: {{ $carro->lugares }}</p>

                        <p>seguro: {{ $carro->seguro }}</p>

                        <p>inspeçao: {{ $carro->inspecao }}</p>
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