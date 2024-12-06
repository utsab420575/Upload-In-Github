<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function login(){
       return view('forms.login');
    }
    public function login_submit(Request $request){
        $email=$request->email;
        $password=$request->password;
        return response()->json([
            "email"=>$email,
            "password"=>$password
        ]);
    }
}
