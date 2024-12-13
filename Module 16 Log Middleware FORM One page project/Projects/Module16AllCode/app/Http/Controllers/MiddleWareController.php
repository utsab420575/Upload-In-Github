<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiddleWareController extends Controller
{
    public function middleware_test(){
        return "Time and Authorize User Enter Successfully";
    }

    public function redirect_using_middleware_1(Request $request){
        return "Your key is ".$request->api_key;
    }
    public function redirect_using_middleware_2(Request $request){
        return "From Redirect 2";
    }
    public function group_test_1(Request $request){
        $name=$request->input('name');
        $email=$request->input('email');
        return response()->json([
            "route"=>"group test 1",
            "name"=>$name,
            "email"=>$email
        ]);
    }
    public function group_test_2(Request $request){
        $name=$request->input('name');
        $email=$request->input('email');
        return response()->json([
            "route"=>"group test 2",
            "name"=>$name,
            "email"=>$email
        ]);
    }
    public function group_test_3(Request $request){
        $name=$request->input('name');
        $email=$request->input('email');
        return response()->json([
            "route"=>"group test 3",
            "name"=>$name,
            "email"=>$email
        ]);
    }

    public function age_country_test(Request $request){
        $country=$request->input('country');
        $age=$request->input('age');
        return response()->json([
            "route"=>"age country test",
            "country"=>$country,
            "age"=>$age
        ]);
    }

    public function rate_limiting(){
        return response("Rate Limit Called");
    }
}
