<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;





class DemoController extends Controller
{

    // Response Type String
    function demo1(){
        return "Response Type String";
    }

    // Response Type Int
    function demo2(){
        return 100;
    }


    // Response Type Null
    function demo3(){
        return null;
    }

    // Response Type Boolean
    function demo4(){
        return false;
    }

    // Response Type Array
    function demo5(){
        return array('A','B','C');
    }


    // Response Type Assoc Array
    function demo6(){
        return array(['name'=>'ostad1','age'=>20],['name'=>'ostad2','age'=>30]);
    }


    // Response Type JSON
    function demo7(){
        return response()->json([['name'=>'ostad1','age'=>20],['name'=>'ostad2','age'=>30]]);
    }


    // Response message,data,code
    function demo8(){
        return response()->json(['message'=>'Registration Success','data'=>['name'=>'ostad1','age'=>20]],401);
    }



    // Response Redirect
    function demo9(){
        return redirect('/demo1');
    }


    // Binary File Response
    function demo10(){
        $path="img.jpg";
        return response()->file($path);
    }



    // download File Response
    function demo11(){
        $path="img.jpg";
        return response()->download($path);
    }



    // response cookies
    function demo12(){
        return response("Say Hello")->cookie('my-cookies','ostadXYZ');
    }


    // attaching response header
    function demo13(){

        return response("Hello")->header('my-token','abc1223zyx');
    }


    // response view
    function demo14(){
        return view('index');
    }




    //--------------------------------------------------------------------------------------------------------------



    // Request URL Params

    function demo15(Request $request){
            $a=$request->num1;
            $b=$request->num2;
            return $a+$b;
    }


    // Request Body

    function demo16(Request $request){
            $wholeBody=$request->input();
            $a=$wholeBody['num1'];
            $b=$wholeBody['num2'];
            return $a+$b;
    }


    // Request Header

    function demo17(Request $request){

        $a=$request->header('my_key');
        return $a;

    }


    // Request IP
    function demo18(Request $request){


        return $request->ip();
    }


    // Request Cookies
    function demo19(Request $request){

        $myCookies=$request->cookie('XSRF-TOKEN');

        return $myCookies;
    }







}
