<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model{
    protected $table = "cursos";
    protected $primaryKey = "idcurso";
    public $timestamps = false;
    protected $fillable = [
        'idcurso','nomecurso'
    ];
}
