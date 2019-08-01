<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //product information model
    //not null
    public static $rules =[
      'pname'=>'required',
      'ptitle'=>'required',
      'ptext'=>'required',
      'price'=>'required',
      'quan'=>'required',
      'main'=>'required|image|mimes:jpg,jpeg,png|max:500',
      'sub1'=>'required|image|mimes:jpg,jpeg,png|max:500',
      'sub2'=>'required|image|mimes:jpg,jpeg,png|max:500',
      'category'=>'required',
    ];

    protected $fillable=[
      'pname','ptitle','ptext','price','quan','main',
      'sub1','sub2','category',
    ];

    protected $primaryKey = 'pid';

    public function scopealsolike($query)
    {
      return $query->inRandomOrder()->take(4);
    }

}
