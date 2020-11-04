<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\RequestUser;

class PerfilController extends Controller
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
        $user = \App\User::where('id' , \Auth::id())->firstOrFail();
        // $nome = \App\User::where('id' , \Auth::id())->firstorfail()->name;
        // $email= \App\User::where('id' , \Auth::id())->firstorfail()->email;
        // $contacto= \App\User::where('id' , \Auth::id())->firstorfail()->contacto;
        // $num= \App\User::where('id' , \Auth::id())->firstorfail()->ismai;
        return view('userpage', ['user' => $user]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    

    public function edit($id)
    {
        $user = \App\User::findOrFail($id);
        return view('auth.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUser $request, $id)
    {
        $user = \App\User::where('id' , \Auth::id())->firstOrFail();
        $data = $request->all();
        $user->update([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'contacto' => $data['contacto'],1
        ]);
        return redirect(route('perfil.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::where('id' , \Auth::id())->firstOrFail();
        $user->delete();

        return redirect()->to('/');
    }

}
