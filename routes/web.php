<?php
use App\Http\Controllers\EmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('viagem', 'ViagemController');
Route::resource('carro', 'CarroController');
Route::resource('anuncio', 'AnuncioController');
Route::resource('passageiro', 'PassageiroController');
Route::resource('perfil', 'PerfilController');




Route::get('contact-us', 'ContactUSController@contactUS');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactSaveData']);


Auth::routes();

