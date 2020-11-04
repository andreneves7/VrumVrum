<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carro;
use App\Http\Requests\RequestCarro;

class CarroController extends Controller
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
        $carros = \App\carro::where('dono', \Auth::id())->orderBy('matricula', 'asc')->paginate(10);;        
        return view('carro.indexcar', ['carros' => $carros]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carro.carro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCarro $request)
    {
        $data = $request->all();
        \Log::debug($data);
        carro::create([
            'matricula' => $data['matricula'],
            'lugares' => $data['lugares'],
            'seguro' => $data['seguro'],
            'inspecao'=> $data['inspecao'],
            'dono' => \Auth::id(),
        ]);
        return redirect(route('carro.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carro = \App\carro::findOrFail($id);
        return view('carro.showcar', ['carro' => $carro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carro = \App\carro::findOrFail($id);
        return view('carro.editcar', ['carro' => $carro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCarro $request, $id)
    {
        $carro = \App\carro::findOrFail($id);
        $data = $request->all();
        \Log::debug($data);
        $carro->update([
            'matricula' => $data['matricula'],
            'lugares' => $data['lugares'],
            'seguro' => $data['seguro'],
            'inspecao'=> $data['inspecao'],
            'dono' => \Auth::id(),
        ]);
        return redirect(route('carro.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carro = \App\carro::findOrFail($id);
        $carro->delete();
        return redirect(route('carro.index'));
    }
}
