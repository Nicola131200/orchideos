<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
Auth::routes();

Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('index');
    }else{
        return view('auth.login');
    }
    
});

#Route::redirect('/home', '/index');


Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('home', 'PiantaController@index')->name('index');

Route::get('piante/create', 'PiantaController@create')->name('piante.create');
Route::post('piante', 'PiantaController@store')->name('piante.store');

Route::get('piante/edit/{id}', 'PiantaController@edit')->name('piante.edit');
Route::post('piante/update/{id}', 'PiantaController@update')->name('piante.update');

Route::get('piante/show/{id}','PiantaController@show')->name('piante.show');

Route::delete('piante/delete/{id}','PiantaController@destroy')->name('pianta.delete');


