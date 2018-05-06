<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CursoController extends Controller{
    public function novo(Request $request){//Cadastrar novo curso
        $data = array();
        if($request->isMethod("POST")){
            $nomecurso = $request->input("nomecurso");
            $curso = new \App\Curso();
            
            $curso->nomecurso = $nomecurso;
            
            if($nomecurso == ""){
                $data["resp"] = "<div class='alert alert-warning'>"
                        . "Digite o nome do curso</div>";
            }else if($curso->save()){
                $data["resp"] = "<div class='alert alert-success'>"
                        . "Curso cadastrado com sucesso</div>";
            }else{
                $data["resp"] = "<div class='alert alert-danger'>"
                        . "Erro ao cadastrar o curso</div>";
            }
        }
        $lista = \App\Curso::all();
        $data["lista"] = $lista;
        return view('curso/novo', $data);
    }
    
    public function excluir($idcurso){//Excluir curso
        $data = array();        
        $curso = \App\Curso::find($idcurso);
        if($curso == null){
            $data["resp"] = "<div class='alert alert-danger'>"
                    . "Curso não encontrado</div>";
        }else{         
            $curso->delete();       
        }        
        return redirect('admin/curso/novo.htm');
    }
}
