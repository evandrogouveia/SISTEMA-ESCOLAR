<?php
namespace App\Repository;
use App\Aluno;

class AlunoDao {
    /**
     * @var Aluno
     */
    private $model;
    
    public function __construct(Aluno $a){
        $this->model = $a;
    }
    
    public function buscar($nome = ""){//Função para buscar os dados do aluno no banco
        $select = $this->model
                ->join("endereco as e", "e.idaluno", "=",
                        "aluno.idaluno")
                ->leftJoin("cursos as c", "c.idcurso","=",
                        "aluno.idcurso")
                ->where("nome", "like", $nome . "%")
                ->orderBy("nome")
                ->limit(3);
        
        return $select->get();
    }
    
    public function listar(){//Função para listar os alunos cadastrados
        $select = $this->model
                ->join("endereco as e", "e.idaluno", "=",
                        "aluno.idaluno")
                ->leftJoin("cursos as c", "c.idcurso","=",
                        "aluno.idcurso")
                ->orderBy("aluno.idaluno", "desc")
                ->limit(3);
        return $select->get();
    }
}
