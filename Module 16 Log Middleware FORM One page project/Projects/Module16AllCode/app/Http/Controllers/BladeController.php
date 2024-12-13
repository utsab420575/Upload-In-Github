<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladeController extends Controller
{
    //
    public function sample_blade_show()
    {
        return view('home');
    }
    public function associative_array_pass_1()
    {
        $user = [
            'name' => 'utsab roy',
            'email' => 'utsab@duet.ac.bd',
            'mobile' => '01829729657',
        ];
        return view('array_pass_1', ['user' => $user]);
    }
    public function associative_array_pass_2(Request $request)
    {
        $value1 = $request->value1;
        $value2 = $request->value2;
        $result = $value1 + $value2;
        return view('array_pass_2', [
            'value1' => $value1,
            'value2' => $value2,
            'result' => $result,
        ]);
    }
    public function if_else_in_blade(Request $request)
    {
        return view('if_else_in_blade', ['result' => $request->result]);
    }

    public function if_else_in_controller(Request $request)
    {
        $result = $request->result;
        $grade = '';
        if ($result >= 80) {
            $grade = 'A+';
        } elseif ($result >= 70) {
            $grade = 'A';
        } elseif ($result >= 60) {
            $grade = 'A-';
        } else {
            $grade = 'Fail';
        }
        return view('if_else_in_controller', [
            'result' => $request->result,
            'grade' => $grade,
        ]);
    }

    public function for_loop(){
        return view('for_loop');
    }
    public function for_each_loop(){
        $products = [
            ['name' => 'Apple', 'color' => 'Red', 'price' => 1.2],
            ['name' => 'Banana', 'color' => 'Yellow', 'price' => 0.5],
            ['name' => 'Carrot', 'color' => 'Orange', 'price' => 0.8],
            ['name' => 'Broccoli', 'color' => 'Green', 'price' => 1.5],
        ];
        return view('for_each',["products"=>$products]);
    }
    public function for_each_loop_1(){
        $data = [
            'Fruits' => [
                ['name' => 'Apple', 'color' => 'Red', 'price' => 1.2],
                ['name' => 'Banana', 'color' => 'Yellow', 'price' => 0.5],
            ],
            'Vegetables' => [
                ['name' => 'Carrot', 'color' => 'Orange', 'price' => 0.8],
                ['name' => 'Broccoli', 'color' => 'Green', 'price' => 1.5],
            ],
        ];
        return view('for_each_loop_1',["data"=>$data]);
    }
}
