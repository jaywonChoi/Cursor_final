<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
  public function getnonno()
  {
    $nonnos = Product::orderBy('created_at','desc');
    $nonnos = Product::all()->where('category', 'nonno');
    return view('/category/nonno',compact('nonnos'));
  }
  public function getmensnonno()
  {
    $mensnonnos = Product::orderBy('created_at','desc');
    $mensnonnos = Product::all()->where('category', 'men_nonno');
    return view('/category/mensnonno',compact('mensnonnos'));
  }
  public function getanan()
  {
    $anans = Product::orderBy('created_at','desc');
    $anans = Product::all()->where('category', 'anan');
    return view('/category/anan',compact('anans'));
  }
  public function getseventeen()
  {
    $seventeens = Product::orderBy('created_at','desc');
    $seventeens = Product::all()->where('category', 'seventeen');
    return view('/category/seventeen',compact('seventeens'));
  }
  public function getjelly()
  {
    $jellys = Product::orderBy('created_at','desc');
    $jellys = Product::all()->where('category', 'jelly');
    return view('/category/jelly',compact('jellys'));
  }
  public function getleane()
  {
    $leanes = Product::orderBy('created_at','desc');
    $leanes = Product::all()->where('category', 'leane');
    return view('/category/leane',compact('leanes'));
  }
  public function getnylon()
  {
    $nylons = Product::orderBy('created_at','desc');
    $nylons = Product::all()->where('category', 'nylon');
    return view('/category/nylon',compact('nylons'));
  }

}
