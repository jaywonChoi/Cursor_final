<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Input;

class ContactController extends Controller
{

    public function storeCursor(Request $request)
    {
      //contact save
      $contact= new Contact([
        'name'=>$request->input('name'),
        'email'=> $request->input('email'),
        'title'=>$request->input('title'),
        'text'=>$request->input('text'),
      ]);

      $contact->save();

      return redirect()->back()->with('success_message', 'Thanks to sending message to Cursor!');


    }
    public function index()
    {
      $contacts = Contact::orderBy('id');
      $contacts = Contact::all();
      return view('/admin-contact/contacts',compact('contacts'));
    }

}
