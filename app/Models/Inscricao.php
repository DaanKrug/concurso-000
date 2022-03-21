<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
	protected $fillable = [
	    'pessoa_fisica_id',
	    'cargo',
	    'situacao',
	    'dt_criacao',
	    'dt_alteracao'
	];
	
	public static function create(Inscricao $inscricao){
    	return $inscricao->save();
    }
    
    public static function update(Inscricao $inscricao){
    	return $inscricao->save();
    }
    
    public static function loadById(Inscricao $inscricao){
        return PessoaFisica::find($inscricao->id);
    }
    
    public static function delete(Inscricao $inscricao){
        $inscricao = $this->loadById($inscricao);
    	return $inscricao->delete();
    }
}
