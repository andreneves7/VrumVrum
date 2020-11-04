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

p {
    color: white;
}

h5 {
    color: white;
}

label {
    color: white;
}

.btn {
    padding: 5px 35px;
}

.btn1 {
    padding: 5px;
}
</style>

<div class="container emp-profile">
    <div class="row">
        <div class="col-md-6" style="padding-top: 30px !important;">
            <div class="profile-head">
                <h5>
                    Dados Pessoais
                </h5>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <!-- Falta aterar a linha abaixo-->
                        <a class="nav-link active" id="home-tab" data-toggle="tab"
                            href="file:///C:/Users/hgrod/Desktop/navbar/navbar/index.html#home" role="tab"
                            aria-controls="home" aria-selected="true"><b>Sobre</b></a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="col-md-2" style="padding-top: 40px !important;">
            <form action="{{route('perfil.edit', ['perfil' => $user->id])}}">
                <button class="btn btn-primary ">Editar</button>
            </form>

            <br>


            <form method="POST" action="{{route('perfil.destroy', ['perfil' => $user->id])}}">
                @csrf
                @method("DELETE")
                <button id="btn1" class="btn btn1 btn-primary ">Eliminar Conta</button>
            </form>
        </div>

        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label><b><i>Nome:</i></b></label>
                        </div>
                        <div class="col-md-6">
                            <p> {{ $user->name }}<span class="caret"></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label><b><i>Email:</i></b></label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label><b><i>Contacto:</i></b></label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $user->contacto }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label><b><i>numero ismai:</i></b></label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $user->ismai }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection