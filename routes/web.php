<?php

use Illuminate\Support\Facades\Route;

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
    if(Auth::check()){
        return redirect()->route('index');
    }else{
        return view('auth.login');
    }
    
});

#Route::redirect('/home', '/index');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('home', 'PiantaController@index')->name('index');
Route::get('piante/create', 'PiantaController@create')->name('piante.create');
Route::post('piante', 'PiantaController@store')->name('piante.store');


