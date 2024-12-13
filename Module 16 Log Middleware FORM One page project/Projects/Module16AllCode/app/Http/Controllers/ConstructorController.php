<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ConstructorController extends Controller
{
    public function __construct()
    {
        // Code that runs when the controller is instantiated
        // Apply middleware to all methods
        //$this->middleware('auth');

        // Apply middleware to specific methods
        //$this->middleware('throttle:5,1')->only('index');

        // Exclude specific methods from middleware
        //$this->middleware('auth')->except('show');

        $this->middleware('throttle:3,1');
    }

    public function controller_constructor_1(){
        return response("Controller Constructor 1");
    }
    public function controller_constructor_2(){
        return response("Controller Constructor 2");
    }
}
