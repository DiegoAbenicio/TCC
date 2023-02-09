<?php

use App\Http\Controllers\AnimaisController;
use App\Http\Controllers\ARController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\SearchController;
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

Route::get('/', 'App\Http\Controllers\EventController@returnAgenda')->name('returnAgenda');



Route::resource('animais', AnimaisController::class);
Route::resource('clientes', ARController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('list', ListController::class);
Route::resource('servicos', ServicosController::class);
Route::resource('mapa', MapController::class);



Route::get('autocomplete', [AnimaisController::class, 'autocomplete'])->name('autocomplete');
Route::get('agenda', 'App\Http\Controllers\EventController@returnAgenda')->name('returnAgenda');
Route::get('index', 'App\Http\Controllers\EventController@index')->name('allEvent');
Route::post('store', 'App\Http\Controllers\EventController@store')->name('store');
Route::post('/mapa/filtragem', [MapController::class, 'filtragem'])->name('mapa.filtragem');


Route::get('/mapa/show/map', 'courtController@showmap')->name('courts.showmap');
