<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Categorie;

class ContactController extends Controller
{

      // Store Contact Form data
      public function sendContact(Request $request) {

        // Form validation
          $this->validate($request, [
              'name' => 'required',
              'email' => 'required|email',
              'phone' => 'required',
              'subject'=>'required',
              'message' => 'required'
           ]);
          //  Store data in database
          Contact::create($request->all());
          // 
          return redirect()->back();
      }
      public function contact(){
        $categories = Categorie::all();
        return view('contact',["categories"=>$categories]);
    }
  
}
