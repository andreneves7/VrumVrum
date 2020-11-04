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

.btn {
    margin-top: 0 !important;
    margin-right: 100px;
}

.btn1 {
    margin-top: 0 !important;
    margin-left: 500px;
}
</style>

<body>
    <div class="container">
        <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card">
                <div class="card-header" role="tab" id="headingTwo">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                            aria-expanded="false" aria-controls="collapseTwo">
                            CARROS
                        </a>
                        <form action="{{ route('carro.create')}}">
                            <button id="btn1" class="btn btn1 btn-primary">Criar</button>
                        </form>
                    </h5>
                </div>
                @foreach($carros as $carro)
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="card-block">
                        <div class="container">

                            <div class="dropdown">
                                <br>
                                <div class="container">
                                    <table class="table table-bordered">

                                        <tbody text-alignL="center;">
                                            <tr>
                                                <td width="60%">
                                                    <a href="{{ route('carro.show', $carro->id) }}">
                                                        matricula: {{$carro->matricula}}
                                                    </a>
                                                </td>

                                                <td>
                                                    <div class="container">
                                                        <div class="btn-btn-primary">
                                                            <form action="{{ route('carro.edit', $carro->id)}}">
                                                                <button class="btn btn-primary">Editar</button>
                                                            </form>
                                                            <form action="{{ route('carro.destroy',$carro->id)}}"
                                                                method="POST">
                                                                @csrf
                                                                @method('Delete')
                                                                <button class="btn btn-primary">Apagar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{ $carros->links() }}
    </div>
</body>
@endsection