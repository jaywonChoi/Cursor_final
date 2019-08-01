<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //admin's information page Model
    protected $fillable =[
      'id','password','company',
    ];

    

}
