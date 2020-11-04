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
                    <div class="card-header">{{ __('Carro') }}</div>
                    <div class="card-body">
                        <form action="{{ route('carro.update', $carro->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('carro.form')
                            <div class="col-md-8 offset-md-4">
                                <div class="form-group row mb-0">
                                    <button class="btn btn-primary ">alterar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection