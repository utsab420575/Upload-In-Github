<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    function test1()
    {
         // Selecting All Rows
         $result= DB::table('brands')->get();



        // Selecting First Rows
        $result= DB::table('brands')->first();




        // Selecting First by ID
       $result= DB::table('brands')->find(4);



        // Selecting First by ID
        // $result= DB::table('brands')->find(4);



        // Selecting Specific Column
        $result= DB::table('brands')->pluck('brandName');



        // Row Count
        $result= DB::table('products')->count();




        // max(),min(),avg(),sum()
       $result= DB::table('products')->sum('price');


        // Select Specific Column from row
       $result= DB::table('products')->select('title','price')->get();




        // Select Unique
       $result= DB::table('products')->select('title')->distinct()->get();







        // জয়েন= ছেলের বাড়ি + মেয়ে + ছেলে
        $result= DB::table('products')
            ->join('categories','products.category_id', '=','categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->get();





        // জয়েন= ছেলের বাড়ি + মেয়ে + ছেলে
        $result= DB::table('products')
            ->leftJoin('categories','products.category_id', '=','categories.id')
            ->leftJoin('brands','products.brand_id','=','brands.id')
            ->get();




        // জয়েন= ছেলের বাড়ি + মেয়ে + ছেলে
        $result= DB::table('products')
            ->rightJoin('categories','products.category_id', '=','categories.id')
            ->rightJoin('brands','products.brand_id','=','brands.id')
            ->get();






        // Cross Join
        $result= DB::table('products')
                ->crossJoin('brands')
                ->get();




        // Simple Pagination
        $result= DB::table('products')->simplePaginate(3);




        // Custom Pagination
            // $perPage=5;
            //  $cloumns=["*"];
            // $pageName='items';
        $result= DB::table('products')->paginate(
            $perPage=5,
            $columns=["*"],
            $pageName='items'
        );





        // Pagination By Using skip & take methods --> This is very poor strategy
        $result= DB::table('products')
            ->skip(4)
            ->take(2)
            ->get();







        // Latest & Oldest
        $result9= DB::table('products')->oldest()->first();




        return $result;
    }
}
