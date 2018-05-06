<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = "endereco";
    protected $primaryKey = "idendereco";
    public $timestamps = false;
    protected $fillable = [
        'idendereco', 'endereco','bairro','cidade', 'cep', 'estado', 'idaluno'
    ];
    
    public function aluno(){
        return $this->belongsTo("App\Aluno", "idaluno");
    }
}