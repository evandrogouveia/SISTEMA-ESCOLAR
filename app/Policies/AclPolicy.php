<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AclPolicy{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }
    
    public function adm(\App\Usuario $usuario){
        return $usuario->perfil == "ADM";
    }
    
    public function usuario(\App\Usuario $usuario){
        return $usuario->perfil == "USER";
    }
    
    public function publica(\App\Usuario $usuario){
        return $usuario->perfil == "ADM" || $usuario->perfil == "USER";
    }
}
