<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Usuario extends Model implements Authenticatable{

    protected $hidden = ['password'];

    use HasFactory;

    public $timestamps = false;

    public function getAuthIdentifierName(){
        return 'id';
    }

    public function getAuthIdentifier(){
        return $this->id;
    }

    public function getAuthPassword(){
        return $this->password;
    }

    public function getRememberToken(){
        return $this->remember_token;

    }

    public function setRememberToken($value){
        $this->remember_token = $value;
    }

    public function getRememberTokenName(){
        return 'remember_token';
    }
};
