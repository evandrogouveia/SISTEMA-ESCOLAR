<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model{  
    protected $table = "aluno";
    protected $primaryKey = "idaluno";
    public $timestamps = false;
    protected $fillable = [
        'idaluno','matricula','nome','telefone','sexo', 'salario','email','idcurso','datanasc',
        'estadocivil', 'nacionalidade'
    ];
    
    public function __construct($db = "mysql") {
        $this->connection = $db;
    }
    
    public function endereco(){
        return $this->hasOne("App\Endereco", "idaluno");
    }
    
    public function curso(){
        return $this->belongsTo("App\Curso", "idcurso");
    }
}
