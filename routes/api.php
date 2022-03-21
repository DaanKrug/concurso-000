<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/pessoa_fisica', 'PessoaFisicaController@index');
Route::get('/pessoa_fisica/{id}', 'PessoaFisicaController@show');
Route::post('/pessoa_fisica', 'PessoaFisicaController@store');
Route::patch('/pessoa_fisica', 'PessoaFisicaController@update');
Route::delete('/pessoa_fisica', 'PessoaFisicaController@destroy');

Route::get('/inscricao', 'InscricaoController@index');
Route::get('/inscricao/{id}', 'InscricaoController@show');
Route::post('/inscricao', 'InscricaoController@store');
Route::patch('/inscricao', 'InscricaoController@update');
Route::delete('/inscricao', 'InscricaoController@destroy');