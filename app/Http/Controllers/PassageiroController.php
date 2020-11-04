<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Passageiro;

class PassageiroController extends Controller
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
        $passageiros = \App\passageiro::all();
        return view('anuncio.detalhes', ['passageiros' => $passageiros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anuncios= \App\anuncio::where('id_viagem')->get();
        
        return view('anuncio.lista', ['anuncios' => $anuncios]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $data = $request->all();
        \Log::debug($data);
        passageiro::create([
            'id_viagem' => $data['idanuncio'],
            'id_passageiro' => \Auth::id(),
        ]);
        return redirect(route('anuncio.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $passageiro = \App\passageiro::where('id_passageiro', $id)->delete();

        return redirect(route('anuncio.index'));
    }
}
