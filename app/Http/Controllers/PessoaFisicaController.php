<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PessoaFisica;

class PessoaFisicaController extends Controller
{
   
    public function __construct(){}

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nome' => 'required',
			    'cpf' => 'required',
			    'endereco' => 'required',
			    'cidade_id' => 'required',
			    'estado_id' => 'required',
            ]
        );
        
	    $pessoa = new PessoaFisica();
	    $pessoa->nome = $request->nome;
	    $pessoa->cpf = $request->cpf;
	    $pessoa->endereco = $request->endereco;
	    $pessoa->cidade_id = $request->cidade_id;
	    $pessoa->estado_id = $request->estado_id;
	    
        return json_encode(PessoaFisica::create($pessoa));
    }
    
    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
                'pessoa_fisica_id' => 'required',
                'nome' => 'required',
			    'cpf' => 'required',
			    'endereco' => 'required',
			    'cidade_id' => 'required',
			    'estado_id' => 'required',
            ]
        );
        
	    $pessoa = new PessoaFisica();
	    $pessoa->pessoa_fisica_id = $request->pessoa_fisica_id;
	    $pessoa->nome = $request->nome;
	    $pessoa->cpf = $request->cpf;
	    $pessoa->endereco = $request->endereco;
	    $pessoa->cidade_id = $request->cidade_id;
	    $pessoa->estado_id = $request->estado_id;
	    
        return json_encode(PessoaFisica::update($pessoa));
    }

    public function index(Request $request)
    {
    	$this->validate(
            $request,
            [
                'nome' => 'nullable'
            ]
        );
        
        if(null != $request->nome){
        	$result = PessoaFisica::where('nome', $request->nome)->orderBy('nome')->get();
        	return json_encode($result);
        }
        
        return json_encode(PessoaFisica::orderBy('nome')->get());
    }

    public function show(Request $request)
    {
        $this->validate(
            $request,
            [
                'pessoa_fisica_id' => 'required'
            ]
        );
        
        $pessoa = new PessoaFisica();
	    $pessoa->pessoa_fisica_id = $request->pessoa_fisica_id;
	    
        return json_encode(PessoaFisica::loadById($pessoa));
    }


    public function destroy(Request $request)
    {
        $this->validate(
            $request,
            [
                'pessoa_fisica_id' => 'required'
            ]
        );
        
        $pessoa = new PessoaFisica();
	    $pessoa->pessoa_fisica_id = $request->pessoa_fisica_id;
	    
        return json_encode(PessoaFisica::delete($pessoa));
    }

}
