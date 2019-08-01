<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
         'name','email', 'title','text'
    ];

    public static $rules =[
      'name'=>'required',
      'email'=>'email|required',
      'title'=>'required',
      'text'=>'required'
    ];
}
