<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
      public static $rules =[
        'uid'=>'required|unique:users',
        'email'=> 'email|required',
        'password'=>'required|min:4',
        'fullname'=>'required',
        'phone'=>'required',
        'sex'=>'required'
    ];

    protected $fillable = [
         'uid','email', 'password','fullname','phone','sex'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders(){
      return $this->hasMany('App\Order');
    }


}
