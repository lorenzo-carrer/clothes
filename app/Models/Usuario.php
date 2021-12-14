<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Usuario extends Authenticatable implements MustVerifyEmail{

    protected $hidden = ['password'];

    use HasFactory;

    use Notifiable;

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
