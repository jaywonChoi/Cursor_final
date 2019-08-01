<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'uid',
      'products',
      'total',
      'fullname',
      'email',
      'zip',
      'address_do',
      'address_si',
      'address_city',
      'phone',
      'card_name',
      'payment_id',
    ];
    public function user(){
         return $this->belongsTo('App\User');
     }
     public function products(){
       return $this->belongsToMany('App\Product')->withPivot('quan');
     }
}
