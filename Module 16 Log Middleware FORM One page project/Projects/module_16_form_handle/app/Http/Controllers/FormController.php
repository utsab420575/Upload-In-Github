<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //show form
    public function form_show()
    {
        return view('forms.form');
    }
    public function form_submit(Request $request)
    {
        //Validation
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'price' => 'required|numeric|min:0|max:1000',
            ],
            [
                'name.required' => 'The name field is mandatory.',
                'name.string' => 'The name must be a valid string.',
                'name.max' => 'The name must not exceed 255 characters.',
                'email.required' => 'The email field is mandatory.',
                'email.email' => 'Please provide a valid email address.',
                'price.required' => 'The price field is mandatory.',
                'price.numeric' => 'The price must be a valid number.',
                'price.min' => 'The price must be at least 0.',
                'price.max' => 'The price not greater than 1000 boss.',
            ],
        );
        //return redirect()->route('home')->with('success', 'Form Submitted Successfully!');
        //return redirect()->route('home');
        return back()->with('success', 'Form Submitted Successfully!');
    }
    public function registration_form_show(){
        return view('forms.registrationForm');
    }
    public function registration_form_submit(RegistrationFormRequest $request){
        //this is for getting validated data
        //$validatedData=$request->validated();
        return back()->with('success', 'Form Submitted Successfully!');
    }
}
