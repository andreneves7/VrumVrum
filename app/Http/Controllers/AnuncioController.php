<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viagem;
use App\User;
use Carbon\Carbon as Carbon;

class AnuncioController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anuncios = \App\anuncio::where('data_boleia', '>', Carbon::now()->toDateString())->orderBy('data_boleia', 'asc')->paginate(10);
        return view('anuncio.lista', ['anuncios' => $anuncios]);
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anuncio = \App\anuncio::findOrFail($id);
        // $passageiros = \App\passageiro::all();
        $mcarro = (\App\carro::find(\App\viagem::find($anuncio->id_viagem)->carro))->matricula;
        $numlugares = (\App\carro::find(\App\viagem::find($anuncio->id_viagem)->carro))->lugares;
        $tele = (\App\User::find(\App\viagem::find($anuncio->id_viagem)->condutor))->contacto;
        $pass = \App\passageiro::where('id_viagem', $anuncio->id_viagem)->count();
        $disponivel = $numlugares - $pass;
        $idcond =\App\viagem::find($anuncio->id_viagem)->condutor;

        // $final = (\App\User::find(\App\passageiro::where('id_viagem', $anuncio->id_viagem)->get()->id_passageiro))->name;
        // $contacto = (\App\User::find(\App\passageiro::where('id_viagem', $anuncio->id_viagem)->get()->id_passageiro))->contacto;
        $passagerDetails = collect();
        $passageiros = \App\Passageiro::where('id_viagem', $anuncio->id_viagem)->get();
        foreach($passageiros as $passageiro){
            $passagerDetails->push(\App\User::select('name', 'contacto')->findOrFail($passageiro->id_passageiro));
        }

        $inTravel = \App\passageiro::where('id_passageiro', \Auth::id())->where('id_viagem', $anuncio->id_viagem)->first();
        if($inTravel){
            $disponivel = -1;
        }
        
        return view('anuncio.detalhes', ['anuncio' => $anuncio , 'mcarro' => $mcarro, 'tele' => $tele , 'numlugares' => $numlugares
        ,'disponivel' => $disponivel, 'idcond' => $idcond, 'passageiros' => $passageiros, 'passagerDetails' => $passagerDetails/*'final' => $final, 
        'contacto'=> $contacto*/]);
    }
}
