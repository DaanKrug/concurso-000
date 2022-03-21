<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model
{
	protected $fillable = [
	    'nome',
	    'cpf',
	    'endereco',
	    'cidade_id',
	    'estado_id'
	];
	
    public static function create(PessoaFisica $pessoa){
    	return $pessoa->save();
    }
    
    public static function update(PessoaFisica $pessoa){
    	return $pessoa->save();
    }
    
    public static function loadById(PessoaFisica $pessoa){
        return PessoaFisica::find($pessoa->pessoa_fisica_id);
    }
    
    public static function delete(PessoaFisica $pessoa){
        $pessoa = $this->loadById($pessoa);
    	return $pessoa->delete();
    }
  
}
