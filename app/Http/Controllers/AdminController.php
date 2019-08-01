<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Admin;
use App\User;

class AdminController extends Controller
{
    //admin page open
    public function index()
    {
      // code...
      
      return view('admin');
    }
    public function index2()
    {

      return view('adminPage');
    }

    //login
    public function login(Request $request)
    {
      // code...
      $adminid= $request->input('adminid');
      $adminpw= $request->input('adminpw');


      $data =DB::select('select * from admins where id=? and password=?',[$adminid,$adminpw]);

      if(count($data)) {
        // session
        $data=session()->all();
        $request->session()->put('adminid',$adminid);
        $adminid= $request->session()->get('adminid');
        return view('adminPage')->with('adminid',$adminid);
      }
      else {
        return view('/admin');
      }
    }
    //logout
    public function logout(Request $request)
    {
      // session out
      $request->session()->flush();
      Auth::logout();
      return redirect('/admin');
    }
}
