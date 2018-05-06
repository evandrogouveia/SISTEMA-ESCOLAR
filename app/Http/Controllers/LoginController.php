<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class LoginController extends Controller {

    public function index(Request $request) {
        $data = array();
        if ($request->isMethod("POST")) {
            $login = $request->input("login");
            $senha = $request->input("senha");

            $credential = [
                'login' => $login, 'password' => $senha
            ];
            if (Auth::attempt($credential)) {
                return redirect()->intended('admin/');
            } else {
                $data["resp"] = "<div class='alert alert-danger'>"
                        . "Usuário inválido</div>";
            }
        }
        return view("login", $data);
    }

    public function sair() {
        Auth::logout();
        return redirect()->intended('/');
    }

    public function novo(Request $request) {
        $data = array();
        if ($request->isMethod("post")) {
            $nome = $request->input("nome");
            $senha = $request->input("senha");
            $login = $request->input("login");
            $perfil = $request->input("perfil");

            $senha = Hash::make($senha);

            $user = \App\Usuario::whereLogin($login)->first();
            if ($user == null) {
                $usuario = new \App\Usuario();
                $usuario->nome = $nome;
                $usuario->password = $senha;
                $usuario->login = $login;
                $usuario->perfil = $perfil;

                if ($usuario->save()) {
                    $data["resp"] = "<div class='alert alert-success'>"
                            . "Usuário cadastrado com sucesso</div>";
                } else {
                    $data["resp"] = "<div class='alert alert-info'>"
                            . "Usuário não cadastrado</div>";
                }
            } else {
                $data["resp"] = "<div class='alert alert-warning'>"
                        . "Login ja existente no sistema</div>";
            }
        }
        return view("novo", $data);
    }

    public function usuariobuscar() {//Função buscar usuario
        $data = array();
        $uDao = new \App\Repository\UsuarioDao(new \App\Usuario);
        
        $data["lista"] = $uDao->listar();
        $data["deletado"] = $uDao->listardeletado();
        return view('usuariobuscar', $data);
    }

    public function editaperfil($id, Request $request) {//Função editar perfil
        $data = array();
        $data["lista"] = \App\Usuario::all();
        try {
            $usuario = \App\Usuario::find($id);
            if ($request->isMethod("POST")) {

                $nome = $request->input("nome", "");
                $senha = $request->input("senha", "");
                $login = $request->input("login", "");
                $perfil = $request->input("perfil", "");

                if (Hash::needsRehash($senha)) {
                    $senha = Hash::make($senha);
                }

                $usuario->nome = $nome;
                $usuario->password = $senha;
                $usuario->login = $login;
                $usuario->perfil = $perfil;

                $usuario->save();

                $data["resp"] = "<div class='alert alert-success'>"
                        . "Perfil editado com sucesso!</div>";

                $usuario = \App\Usuario::find($id);

                return redirect('admin/usuario-buscar');
            }
            $data["a"] = $usuario;
        } catch (Exception $ex) {
            $data["resp"] = "<div class='alert alert-danger'>"
                    . "Operação não realizada</div>";
        }
        return view('editaperfil', $data);
    }
   
    public function excluir($idusuario){//Função excluir usuario
        $data = array();
        $user = \App\Usuario::find($idusuario);
        if($user == null){
            $data["resp"] = "<div class='alert alert-danger'>"
                    . "Usuário não encontrado</div>";
        }else{
            $user->delete();
            
            $data["resp"] = "<div class='alert alert-success'>"
                    . "Usuário excluído com sucesso</div>";
        }       
        return view("usuariobuscar", $data);
    }

    public function esqueci(Request $request) {
        $data = array();
        if ($request->isMethod("POST")) {
            $login = $request->input("login");
            $email = $request->input("email");

            $usuario = \App\Usuario::whereLogin($login)->first();
            if ($usuario == null) {
                $data["resp"] = "<div class='alert alert-danger'>"
                        . "Login não encontrado</div>";
            } else {
                $senha = rand(1000, 9999);
                $usuario->password = Hash::make($senha);

                if ($usuario->save()) {
                    \Mail::send('email', array('login' => $login, 'senha' => $senha), function($message)use($request, $email) {
                        $message->to($email);
                        $message->from("vandogouveia67@gmail.com");
                        $message->subject("Recuperação de Senha");
                    });
                    $data["resp"] = "<div class='alert alert-info'>"
                            . "Uma nova senha foi enviada para o email: " . $email . "</div>";
                } else {
                    $data["resp"] = "<div class='alert alert-info'>"
                            . "Senha não alterada!</div>";
                }
            }
        }
        return view('esqueci', $data);
    }

}
