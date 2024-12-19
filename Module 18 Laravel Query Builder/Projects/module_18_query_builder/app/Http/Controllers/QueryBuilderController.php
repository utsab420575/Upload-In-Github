<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    //select all user
    public function select_all_user()
    {
        //Select All
        $users = DB::table('users')->get();
        return $users;
    }
    //Retrive first record
    public function retrive_first_record()
    {
        $user = DB::table('users')->first();
        return $user;
    }

    //Retrive  record using primary key
    public function retrive_using_id(Request $request)
    {
        $user = DB::table('users')->find($request->id);
        return $user;
    }
    //retrive single value from any column
    public function retrive_single_value_form_column()
    {
        //SELECT `email` FROM `users` LIMIT 1;
        $users = DB::table('users')->value('email');
        return $users;
    }
    public function pluck()
    {
        //Retrive value as key value pair(associative array)
        //key=id value=email
        //it recive max two column
        $users = DB::table('users')->pluck('email', 'id');
        return $users;
    }

    //Select statement

    //Select Any column
    public function select_any_column()
    {
        $users = DB::table('users')->select('id', 'email', 'otp')->get();
        return $users;
    }
    //select with distinct column value
    public function select_with_distinct_column_value()
    {
        $users = DB::table('users')->select('id', 'email')->distinct()->get();
        return $users;
    }
    //select with Alias
    public function select_any_column_alias()
    {
        //Select column and rename column name
        $users = DB::table('users')->select('id as user_id', 'email as user_email')->get();
        return $users;
    }
    public function select_with_where()
    {
        $users = DB::table('users')->select('id', 'email', 'otp')->where('id', '<=', '3')->get();
        return $users;
    }

    //Aggregate Method
    //count
    public function aggregate_count()
    {
        $total_product_row = DB::table('products')->count();
        return $total_product_row;
    }
    public function aggregate_max()
    {
        $max_price = DB::table('products')->max('price');
        return $max_price;
    }
    public function aggregate_min()
    {
        $min_price = DB::table('products')->min('price');
        return $min_price;
    }
    public function aggregate_sum()
    {
        $sum_price = DB::table('products')->sum('price');
        return $sum_price;
    }
    public function aggregate_avg()
    {
        $avg_price = DB::table('products')->avg('price');
        return $avg_price;
    }
    public function sum_with_condition()
    {
        $sum_with_condition = DB::table('products')->where('price', '>', '2000')->sum('price');
        //$sum_with_condition=DB::table('products')->where('price','>','2000')->avg('price');
        return $sum_with_condition;
    }

    //OrderBy GroupBy

    //order By DESC
    public function order_by()
    {
        $order_by_value = DB::table('brands')->orderBy('brandName', 'desc')->get();
        return $order_by_value;
    }
    public function latest()
    {
        $latest_value = DB::table('users')->latest('created_at')->first();
        return $latest_value;
    }
    public function oldest()
    {
        $oldest_value = DB::table('users')->oldest('created_at')->first();
        return $oldest_value;
    }
    public function groupBy()
    {
        $group_value = DB::table('products')->select('price')->groupBy('price')->get();
        return $group_value;
    }
    public function groupByHaving()
    {
        $group_value_with_having = DB::table('products')
                                    ->select('price')->groupBy('price')
                                    ->having('price', '>', '2000')
                                    ->get();
        return $group_value_with_having;
    }




    //Where Clause
    public function where()
    {
        $products = DB::table('products')->where('price', '=', '1500')->get();
        //$products=DB::table('products')->where('price','>=','1500')->get();
        //$products=DB::table('products')->where('price','<=','1500')->get();
        return $products;
    }

    //price<=4000 or id<=3
    //if not give select that will select all column
    public function orWhere()
    {
        $products = DB::table('products')
                        ->select('id', 'title', 'price')
                        ->where('price', '=', '4000')
                        ->orWhere('id', '<=', '3')->get();
        return $products;
    }

    //if not give select that will select all column
    //select price between 1000 to 1500
    public function whereBetween()
    {
        $products = DB::table('products')
            ->select('id', 'title', 'price')
            ->whereBetween('price', [1000, 1500])
            ->get();
        return $products;
    }

    //if not give select that will select all column
    //select price between 1000 to 1500
    public function whereNotBetween()
    {
        $products = DB::table('products')
            ->select('id', 'title', 'price')
            ->whereNotBetween('price', [1000, 1500])
            ->get();
        return $products;
    }

    public function whereIn()
    {
        $products = DB::table('products')
            ->select('id', 'title', 'price')
            ->whereIn('price', [1000, 1500])
            ->get();
        return $products;
    }

    public function whereNotIn()
    {
        $products = DB::table('products')
            ->select('id', 'title', 'price')
            ->whereNotIn('price', [1000, 1500])
            ->get();
        return $products;
    }

    public function whereNull()
    {
        $products = DB::table('products')
            ->select('id', 'title', 'price') // Select specific columns
            ->whereNull('price') // Check for NULL values in the 'price' column
            ->get(); // Execute the query and get the results
        return $products;
    }

    public function whereNotNull()
    {
        $products = DB::table('products')
            ->select('id', 'title', 'price') // Select specific columns
            ->whereNotNull('price') // Check for NULL values in the 'price' column
            ->get(); // Execute the query and get the results
        return $products;
    }

    public function whereColumn()
    {
        $products = DB::table('products')
            ->select('id', 'title', 'price') // Select specific columns
            ->whereColumn('price', 'discount_price') // price is equal to discount_price
            ->get();
        return $products;
    }


    //20/02/2023
    public function where_date_month_year(){
        //for date range
        //->whereBetween('created_at', ['2023-12-01', '2023-12-31'])
        $result=DB::table('users')
                ->whereYear('created_at','=',2023)
                ->whereMonth('created_at','=',2)
                ->whereDay('created_at','=',20)
                ->get();

        if ($result) {
            return response()->json(['data' => $result], 200);
        } else {
            return response()->json(['message' => 'Not found'], 404);
        }
    }

    //simple(for simple query we no need to use function )
   /*  SELECT *
    FROM product
    WHERE price > 2000 OR category_id = 3; */

    /* $products = DB::table('product')
    ->where('price', '>', 2000)
    ->orWhere('category_id', 3)
    ->get(); */


    public function advance_where_no_need(){
        //for date range
        //->whereBetween('created_at', ['2023-12-01', '2023-12-31'])
        $result=DB::table('products')
                ->where(function ($query){
                    $query->where('price','>=',4000)
                          ->orWhere('category_id','=',4);
                })
                ->get();

        if ($result) {
            return response()->json(['data' => $result], 200);
        } else {
            return response()->json(['message' => 'Not found'], 404);
        }
    }


    /* SELECT *
    FROM product
    WHERE (price > 2000 OR category_id = 4)
    AND stock = '0'; */
   /*  If your query involves a mix of AND and OR conditions that need proper grouping
    (e.g., (A AND B) OR (C AND D)), closures help maintain clarity
    and ensure correct SQL generation. */

    public function advance_where_with_function(){
        //for date range
        //->whereBetween('created_at', ['2023-12-01', '2023-12-31'])
        $result=DB::table('products')
                ->where(function ($query){
                    $query->where('price','>=',4000)
                          ->orWhere('category_id','=',4);
                })
                ->where('stock','=',0)
                ->get();

        if ($result) {
            return response()->json(['data' => $result], 200);
        } else {
            return response()->json(['message' => 'Not found'], 404);
        }
    }













    //take first 5 record
    public function take()
    {
        $users = DB::table('users')->select('id', 'email')->take(5)->get();
        return $users;
    }

    //skip first 10 record
    //skip require take also
    public function skip()
    {
        $users = DB::table('users')->select('id', 'email')->skip(10)->take(5)->get();
        return $users;
    }

    //simple paginate
    //Generated Links: Only shows links for previous and next without specific page numbers.
    //Previous Next
    public function simple_paginate()
    {
        $users = DB::table('users')->select('id', 'email')->simplePaginate(5); //Fetch 5 record per page
        return $users;
    }
    //Generated Links: Includes previous, next, and specific page numbers.
    //1 2 3 4 Next
    public function paginate()
    {
        $users = DB::table('users')->select('id', 'email')->paginate(5); //Fetch 5 record per page
        return $users;
    }

















    //Join
    //Inner Join(Product Table : Foreign key Category_id , Brand_id)
    public function inner_join()
    {
        $products = DB::table('products')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->select('products.*', 'categories.categoryName', 'brands.brandName')
                    ->get();
        return $products;
    }

    //Join
    //Left Join(Product Table : Foreign key Category_id , Brand_id)
    //Select all product brand_id category_id  always match in parent table
    //foreign key used in parent table
    //product(left is boss) -> categories brands
    public function left_join()
    {
        $products = DB::table('products')
                    ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                    ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
                    ->select('products.*', 'categories.categoryName', 'brands.brandName')
                    ->get();
        return $products;
    }

    //Join
    //Right Join(Product Table : Foreign key Category_id , Brand_id)
    //Select all brand_id category_id not match than show null in  product information
    //Product<-Category(right is boss)
    public function right_join()
    {
        $products = DB::table('products')
            ->rightJoin('categories', 'products.category_id', '=', 'categories.id')
            //->rightJoin('brands','products.brand_id','=','brands.id')
            //->select('products.*','categories.*','brands.*')
            ->select('products.*', 'categories.id as Category_id', 'categories.*')
            ->get();
        return $products;
    }

    //cross join
    public function cross_join()
    {
        $products = DB::table('products')
            ->crossJoin('categories')
            //->crossJoin('brands')
            ->select('products.*', 'categories.id as Category_id', 'categories.*')
            ->where('categories.categoryName', '=', 'Electronics')
            ->where('products.price', '=', '4000')
            ->get();
        return $products;
    }

    //Union
    //The UNION operator combines the result of both SELECT statements,
    //removing duplicate rows by default.
    public function union(){
        $query1=DB::table('products')
                ->where('price','>=',4000);

        $query2=DB::table('products')
                ->where('category_id','=',4);

        $result=$query1->union($query2)->get();

        return $result;
    }


    //For joining use multiple where clause
    /*way1:Raw Query
    SELECT product.*, category.name AS category_name, brands.brandName AS brand_name
    FROM product
    JOIN category ON product.category_id = category.id AND product.price > 2000
    JOIN brands ON product.brand_id = brands.id AND brands.brandName = 'Hatil'; */



    /*Raw Query 2:
     $products = DB::table('product')
        ->join('category', 'product.category_id', '=', 'category.id')
        ->join('brands', 'product.brand_id', '=', 'brands.id')
        ->where('product.price', '>', 2000)
        ->where('brands.brandName', 'Hatil')
        ->select('product.*', 'category.name as category_name', 'brands.brandName as brand_name')
        ->get(); */



    public function advance_join_using_function(){
        $products=DB::table('products')
                ->join('categories',function($join){
                    $join->on('products.category_id', '=', 'categories.id')
                            ->where('products.price', '>=', 4000);//Adding condition within the join
                })
                ->join('brands',function($join){
                    $join->on('products.brand_id', '=', 'brands.id')
                        ->where('brands.brandName', 'Hatil');// Adding condition within the join
                })
                ->select('products.*', 'categories.categoryName as category_name', 'brands.brandName as brand_name')
                ->get();

        return $products;
    }




    





    //insert data
    public function insert(Request $request)
    {
        $inserted = DB::table('brands')->insert([
            'brandName' => $request->brandName,
            'brandImg' => $request->brandImg,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if ($inserted) {
            return response()->json(['message' => 'Insertion Successful'], 200);
        } else {
            return response()->json(['message' => 'Fail to insert'], 500);
        }
    }

    //inserted and Get Brand Id
    public function insertGetId(Request $request)
    {
        $insertedBrandId = DB::table('brands')->insertGetId([
            'brandName' => $request->brandName,
            'brandImg' => $request->brandImg,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($insertedBrandId) {
            return response()->json(
                [
                    'message' => 'Insertion Successful',
                    'brandId' => $insertedBrandId,
                ],
                200,
            );
        } else {
            return response()->json(['message' => 'Fail to insert'], 500);
        }
    }

    //update products set price=1000 where id=1
    public function update(Request $request, $id)
    {
        //return number of rows affected
        $affected = DB::table('products')
            ->where('id', $id)
            ->update([
                'price' => $request->price,
                'discount' => $request->discount,
            ]);
        if ($affected > 0) {
            return response()->json(
                [
                    'message' => 'Update Successfull',
                ],
                200,
            );
        } else {
            return response()->json(
                [
                    'message' => 'No rows updated',
                ],
                404,
            );
        }
    }

    //UpdateOrInsert update an existing record or insert a new one if it does not exist.
    /* DB::table('table_name')->updateOrInsert(
            ['condition_column' => 'value'], // Matching conditions
            ['update_or_insert_column' => 'new_value'] // Data to update or insert
        );
    */
    public function updateOrInsert(Request $request)
    {
        $result = DB::table('brands')->updateOrInsert(
            // Condition: Look for a record with this brandName
            ['brandName' => $request->brandName],

            // Data to update or insert
            [
                //'brandName' => $request->brandName,
                'brandImg' => $request->brandImg,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        if ($result) {
            return response()->json(['message' => 'Record updated or inserted successfully'], 200);
        } else {
            return response()->json(['message' => 'No changes made'], 200);
        }
    }

    //Increment Decrement
    public function increment_decrement_price()
    {
        $result = DB::table('products')->where('id', '=', 1)->increment('price'); // Increment the price by 1
        //->increment('price',100)
        //->decrement('price')
        //->decrement('price',100)

        if ($result) {
            return response()->json(['message' => 'Price incremented successfully'], 200);
        } else {
            return response()->json(['message' => 'No changes made'], 404);
        }
    }

    //delete: To remove specific rows or all rows while keeping the auto-increment value.
    //Truncate: To clear all rows from a table and reset the auto-increment value.
    public function delete($id)
    {
        $deleted = DB::table('brands')->where('id', '=', $id)->delete();
        if ($deleted) {
            return response()->json(['message' => 'Product deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }


    //delete: To remove specific rows or all rows while keeping the auto-increment value.
    //Truncate method removes all rows from a table and resets the auto-increment counter to zero.
    public function truncate($id)
    {
        $deleted = DB::table('brands')->truncate();
        if ($deleted) {
            return response()->json(['message' => 'Brands Table Deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Brands Table not found'], 404);
        }
    }
}
