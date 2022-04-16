<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Inscricao;
use App\Models\PessoaFisica;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = Estado::all();
        return view('inscricao.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cpf' => 'required',
            'endereco' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'cargo' => 'required',
        ]);

        $estado = Estado::Select("estado_id")->where('sigla', $request->estado)->get();
        $pessoa = new PessoaFisica();
        $pessoa->nome = $request->name;
        $pessoa->cpf = $request->cpf;
        $pessoa->endereco = $request->endereco;
        $pessoa->cidade_id = 1;
        foreach($estado as $state) {
            $pessoa->estado_id = $state->estado_id;  
        }
        $pessoa->save();

        $lastPeople = PessoaFisica::orderByDesc('id')
        ->limit(1)->get();
        
	    $inscricao = new Inscricao();
        foreach($lastPeople as $getPeople) {
            $inscricao->pessoa_fisica_id = $getPeople->id;
        }
	    $inscricao->cargo = $request->cargo;
        $inscricao->save();

      

        return redirect()->route('inscricao.index')
                        ->with('success','Inscrição feita com sucesso.');
    }
}