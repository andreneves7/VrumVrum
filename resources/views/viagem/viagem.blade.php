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
                    <div class="card-header">{{ __('Viagem') }}</div>
                    <div class="card-body">
                        <form method="Post" action="{{ route('viagem.store') }}">
                            @csrf
                            @include('viagem._form')
                            <div class="col-md-8 offset-md-4">
                                <div class="form-group row mb-0">
                                    <button id="createTravel" class="btn btn-primary ">{{ __('Criar') }}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <script>
    $(document).ready(function() {
        $("#createTravel").on("click", function(e) {
            if ($("#destinoInput").val() == "ismai" && $("#origemInput").val() == "ismai") {
                e.preventDefault();
                alert("nao podem ser os dois ismai");
            } else if (!($("#destinoInput").val() == "ismai" || $("#origemInput").val() == "ismai")) {
                e.preventDefault();
                alert("um das moradas tem de ser ismai");
            }

        });
    });
    </script>
</body>


@endsection