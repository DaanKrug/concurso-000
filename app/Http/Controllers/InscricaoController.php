<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscricao;

class InscricaoController extends Controller
{
    public function __construct(){}

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
			    'pessoa_fisica_id' => 'required',
			    'cargo' => 'required',
			    'situacao' => 'required',
			    'dt_criacao' => 'required',
			    'dt_alteracao' => 'required'
            ]
        );
        
	    $inscricao = new Inscricao();
	    $inscricao->pessoa_fisica_id = $request->pessoa_fisica_id;
	    $inscricao->cargo = $request->cargo;
	    $inscricao->situacao = $request->situacao;
	    $inscricao->dt_criacao = $request->dt_criacao;
	    $inscricao->dt_alteracao = $request->dt_alteracao;
	    
        return json_encode(Inscricao::create($inscricao));
    }
    
    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
            	'inscricao_id' => 'required',
			    'pessoa_fisica_id' => 'required',
			    'cargo' => 'required',
			    'situacao' => 'required',
			    'dt_criacao' => 'required',
			    'dt_alteracao' => 'required'
            ]
        );
        
	    $inscricao = new Inscricao();
	    $inscricao->inscricao_id = $request->inscricao_id;
	    $inscricao->pessoa_fisica_id = $request->pessoa_fisica_id;
	    $inscricao->cargo = $request->cargo;
	    $inscricao->situacao = $request->situacao;
	    $inscricao->dt_criacao = $request->dt_criacao;
	    $inscricao->dt_alteracao = $request->dt_alteracao;
	    
	    return json_encode(Inscricao::update($inscricao));
    }

    public function index(Request $request)
    {
    	$this->validate(
            $request,
            [
			    'cargo' => 'nullable'
            ]
        );
        
        if(null != $request->cargo){
        	$result = Inscricao::where('cargo', $request->cargo)->orderBy('cargo')->get();
        	return json_encode($result);
        }
        
        return json_encode(Inscricao::orderBy('cargo')->get());
    }

    public function show(Request $request)
    {
        $this->validate(
            $request,
            [
                'inscricao_id' => 'required'
            ]
        );
        
        $inscricao = new Inscricao();
	    $inscricao->inscricao_id = $request->inscricao_id;
	    
        return json_encode(Inscricao::loadById($inscricao));
    }

    public function destroy(Request $request)
    {
        $this->validate(
            $request,
            [
                'inscricao_id' => 'required'
            ]
        );
        
        $inscricao = new Inscricao();
	    $inscricao->inscricao_id = $request->inscricao_id;
	    
        return json_encode(Inscricao::delete($inscricao));
    }

}