<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends ModelDefault implements Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'admin';

    protected $table = 'admins';

    protected $primaryKey = 'id';

    protected $fillable = ['email','password','nome','image','status'];

    public function getAuthIdentifierName(){
        return 'email';
    }

    public function getAuthIdentifier(){
        return $this->email;
    }

    public function getAuthPassword(){
        return $this->password;
    }

    public function getRememberToken(){}

    public function setRememberToken($value){}

    public function getRememberTokenName(){}

    public function setPasswordAttribute($value){
        $this->attributes["password"] = \Hash::make($value);
    }
}
