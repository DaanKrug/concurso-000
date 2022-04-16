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

$router->group(
    [], 
    function () use ($router) {
		$router->get('/pessoa_fisica', '\App\Http\Controllers\PessoaFisicaController@index');
		$router->get('/pessoa_fisica/{id}', '\App\Http\Controllers\PessoaFisicaController@show');
		$router->post('/pessoa_fisica', '\App\Http\Controllers\PessoaFisicaController@store');
		$router->patch('/pessoa_fisica', '\App\Http\Controllers\PessoaFisicaController@update');
		$router->patch('/pessoa_fisica/{id}', '\App\Http\Controllers\PessoaFisicaController@destroy');
		
		$router->get('/', '\App\Http\Controllers\InscricaoController@index');
		$router->get('/inscricao/{id}', '\App\Http\Controllers\InscricaoController@show');
		$router->post('/inscricao', '\App\Http\Controllers\InscricaoController@store');
		$router->patch('/inscricao', '\App\Http\Controllers\InscricaoController@update');
		$router->patch('/inscricao/{id}', '\App\Http\Controllers\InscricaoController@destroy');
    }
);