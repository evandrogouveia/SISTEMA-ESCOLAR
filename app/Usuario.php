<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
    
class Usuario extends Model implements Authenticatable{
    use SoftDeletes;
    /**
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $table = "usuario";
    protected $primaryKey = "idusuario";
    public $timestamps = false;
    protected $fillable = [
        'idusuario','nome', 'login','password'
    ];
    
    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthIdentifierName() {
        return $this->login;
    }

    public function getAuthPassword() {
        return $this->password;
    }

    public function getRememberToken() {
        
    }

    public function getRememberTokenName() {
        
    }

    public function setRememberToken($value) {
        
    }

}
