<?php
namespace App\Repository;
use App\Usuario;

class UsuarioDao {
    /**
     * @var Usuario
     */
    private $model;
    
    public function __construct(Usuario $a){
        $this->model = $a;
    }
       
    public function listar($id = ""){//Função para listar os usuarios cadastrados
        $select = $this->model
                 ->where("idusuario", "like", $id . "%")
                ->orderBy("usuario.idusuario", "asc")
                ->limit(3);
        return $select->get();
    }
    
    public function listardeletado($id = ""){//Função para listar os usuarios cadastrados
        $select = $this->model->onlyTrashed()
                 ->where("idusuario", "like", $id . "%")
                ->orderBy("usuario.idusuario", "desc")
                ->limit(3);
        return $select->get();
    }
}
