<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller{
    public function index(){//Carregar o index
        $data = array();
        return view('aluno/index', $data);      
    }
    
    public function cadastrar(Request $request){//Função cadastrar novo aluno
        $data = array();
        $data["lista"] = \App\Curso::all();
        if($request->isMethod("POST")){
            try{             
                $matricula = $request->input("matricula");
                $nome = $request->input("nome");
                $telefone = $request->input("telefone");
                $sexo = $request->input("sexo");
                $email = $request->input("email");
                $endereco = $request->input("endereco");
                $bairro = $request->input("bairro");
                $cep = $request->input("cep");
                $cidade = $request->input("cidade");
                $estado = $request->input("estado");
                $idcurso = $request->input("idcurso");
                $datanasc = $request->input("datanasc");
                $estadocivil = $request->input("estadocivil");
                $nacionalidade = $request->input("nacionalidade");
                
                $file = $request->file("foto");
                $ext = $file->getClientOriginalExtension();
                $size = $file->getSize();
                
                if($ext != "jpg" && $ext != "png" && $ext != "jpeg"){
                    $data["resp"] = "<div class='alert alert-info'>"
                            . "Escolha uma IMAGEM valida</div>";
                    //2MB
                }else if($size > (1024 * 1024 * 2)){
                    $data["resp"] = "<div class='alert alert-info'>"
                            . "Tamanho da imagem invalido</div>";
                }else{
                    
                    $fileName = "ft_" .date('YmdHis').".".$ext;
                    
                    $curso = \App\Curso::find($idcurso);

                    $a = new \App\Aluno();
                    $e = new \App\Endereco();
                    
                    $a->matricula = $matricula;
                    $a->nome = $nome;
                    $a->telefone = $telefone;
                    $a->sexo = $sexo;
                    $a->email = $email;
                    $a->foto = $fileName;
                    $a->datanasc = $datanasc;
                    $a->estadocivil = $estadocivil;
                    $a->nacionalidade = $nacionalidade;
                    
                    $a->curso()->associate($curso);

                    $e->endereco = $endereco;
                    $e->bairro = $bairro;
                    $e->cidade = $cidade;
                    $e->cep = $cep;
                    $e->estado = $estado;
                    
                    $a->save();
                    
                    $e->aluno()->associate($a);
                    
                    $e->save();
                    
                    $file->move("fotos", $fileName);
                    
                    $data["resp"] = "<div class='alert alert-success'>"
                            . $nome . ", cadastrado com sucesso!</div>";
                }
            } catch (Exception $ex) {
                $data["resp"] = "<div class='alert alert-danger'>"
                        . "Dados não enviados!</div>";
                }
        }
        return view('aluno/cadastrar', $data);
    }
    
    public function buscar(Request $request){//Função buscar aluno
        $data = array();
        $aDao = new \App\Repository\AlunoDao(new \App\Aluno);
        if($request->isMethod("POST")){
            $nome = $request->input("nome");
            $data["lista"] = $aDao->buscar($nome);
        }else{
            $data["lista"] = $aDao->listar();
        }
        return view('aluno/buscar', $data);
    }
    
    public function  detalhes($id, Request $request){//Função editar o aluno
        $data = array();
        $data["lista"] = \App\Curso::all();
        try{
            $alu = \App\Aluno::find($id);
            if($request->isMethod("POST")){
               
                $nome = $request->input("nome", "");
                $telefone = $request->input("telefone", "");
                $email = $request->input("email", "");
                $endereco = $request->input("endereco", "");
                $bairro = $request->input("bairro", "");
                $cep = $request->input("cep", "");
                $cidade = $request->input("cidade", "");
                $estado = $request->input("estado", "");
                $idcurso = $request->input("idcurso", "");
                
                $file = $request->file("foto");

                /* Caso o usuário não tenha enviado uma nova foto, ignora o trecho abaixo */
                if ($file != null) {
                    $ext = $file->getClientOriginalExtension();
                    $size = $file->getSize();

                    if($ext != "jpg" && $ext != "png" && $ext != "jpeg"){
                        $data["resp"] = "<div class='alert alert-info'>"
                            . "Escolha uma IMAGEM valida</div>";
                        //2MB
                    }else if($size > (1024 * 1024 * 2)){
                        $data["resp"] = "<div class='alert alert-info'>"
                            . "Tamanho da imagem invalido</div>";
                    }
                    $fileName = "ft_" .date('YmdHis').".".$ext;
                    $alu->foto = $fileName;
                }   
                          
                $alu->nome = $nome;
                $alu->telefone = $telefone;
                $alu->email = $email;
                $alu->idcurso = $idcurso;
               
                $alu->save();

                $idend = $alu->endereco->idendereco;

                $e = \App\Endereco::find($idend);

                $e->endereco = $endereco;
                $e->bairro = $bairro;
                $e->cidade = $cidade;
                $e->cep = $cep;
                $e->estado = $estado;

                $e->aluno()->associate($alu);

                $e->save();

                // Caso o usuário não tenha enviado uma foto, ignora o trecho abaixo.
                if ($file != null) {
                    $file->move("fotos", $fileName);
                }
                $data["resp"] = "<div class='alert alert-success'>"
                    . "Aluno editado com sucesso!</div>";

                $alu = \App\Aluno::find($id);

                return redirect('admin/buscar');
            }
            $data["a"] = $alu;
        } catch (Exception $ex) {
            $data["resp"] = "<div class='alert alert-danger'>"
                . "Operação não realizada</div>";
            }
            return view('aluno/detalhes', $data);
    }
    
    public function excluir($idaluno){//Função excluir aluno
        $data = array();
        $alu = \App\Aluno::find($idaluno);
        if($alu == null){
            $data["resp"] = "<div class='alert alert-danger'>"
                    . "Aluno não encontrado</div>";
        }else{
            $alu->endereco()->delete();
            $alu->delete();
            
            $data["resp"] = "<div class='alert alert-success'>"
                    . "Aluno excluído com sucesso</div>";
        }       
        return view("aluno/buscar", $data);
    }
}
