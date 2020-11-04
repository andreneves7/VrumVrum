<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viagem;
use App\Carro;
use App\Http\Requests\RequestViagem;
use Carbon\Carbon as Carbon;
use App\Anuncio;

class ViagemController extends Controller
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
        $viagens = \App\viagem::where('condutor', \Auth::id())->orderBy('data_boleia', 'desc')->paginate(10);   
       $nume = \App\carro::where('dono' , \Auth::id())->count();
        return view('viagem.index', ['viagens' => $viagens,'nume' => $nume]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $carros = \App\carro::where('dono' , \Auth::id())->get();
        $validCars = collect();
        foreach($carros as $carro){
            $dateSeguro = $carro->seguro;
            $date = new Carbon($dateSeguro);
            $dateInspecao = $carro->inspecao;
            $da = new Carbon($dateInspecao);
            if(!$date->isPast() && !$da->isPast()){
                $validCars->push($carro);
            }

        }
        
        return view('viagem.viagem', ['carros' => $validCars ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestViagem $request)
    {
        $idcarro = \App\carro::where('dono' , \Auth::id())->value('id');
        $data = $request->all();
        \Log::debug($data);
        $viagem = viagem::create([
            'data_boleia' => $data['data_boleia'],
            'destino' => $data['destino'],
            'origem' => $data['origem'],
            'carro' => $data["idcarro"],
            'condutor' => \Auth::id(),
        ]);
        
        anuncio::create([
            'data_boleia' => $viagem->data_boleia,
            'destino' => $viagem->destino,
            'origem' => $viagem->origem,
            'passageiro' => \Auth::id(),
            'id_viagem' => $viagem->id
        ]);
        
        return redirect(route('viagem.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viagem = \App\viagem::findOrFail($id);
        return view('viagem.show', ['viagem' => $viagem]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carros= \App\carro::where('dono' , \Auth::id())->get();
        $viagem = \App\viagem::findOrFail($id);
        $validCars = collect();
        foreach($carros as $carro){
            $dateSeguro = $carro->seguro;
            $date = new Carbon($dateSeguro);
            $dateInspecao = $carro->inspecao;
            $da = new Carbon($dateInspecao);
            if(!$date->isPast() && !$da->isPast()){
                $validCars->push($carro);
            }
        }
        return view('viagem.edit', ['viagem' => $viagem],['carros' => $validCars]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestViagem $request, $id)
    {
        $idcarro = \App\carro::where('dono' , \Auth::id())->value('id');
        $idanuncio = \App\anuncio::findOrFail($id);
        $viagem = \App\viagem::findOrFail($id);
        $data = $request->all();
        $viagem->update([
            'data_boleia' => $data['data_boleia'],
            'destino' => $data['destino'],
            'origem' => $data['origem'],
            'carro' => $data["idcarro"],
            'condutor' => \Auth::id(),
        ]);

        $idanuncio->update([
            'data_boleia' => $viagem->data_boleia,
            'destino' => $viagem->destino,
            'origem' => $viagem->origem,
            'passageiro' => \Auth::id(),
            'id_viagem' => $viagem->id
        ]);
        return redirect(route('viagem.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $viagem = \App\viagem::findOrFail($id);
        $viagem->delete();
        return redirect(route('viagem.index'));
    }

    

    
}
