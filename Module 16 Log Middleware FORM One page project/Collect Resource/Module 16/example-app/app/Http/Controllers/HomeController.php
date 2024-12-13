<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function HomePage1()
    {
        $num1=70;
        $num2=20;
        $sum=$num1+$num2;
        return view('home1',['marks'=>$sum]);
    }

    function HomePage2()
    {
        $num1=70;
        $num2=20;
        $sum=$num1+$num2;
        return view('home2',['marks'=>$sum]);
    }
}
