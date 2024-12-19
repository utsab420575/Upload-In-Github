<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryBuilderController;

Route::get('/', function () {
    return view('welcome');
});

//select all row/retrive all record
Route::get('/select-all-user',[QueryBuilderController::class,'select_all_user']);

//Retrive First Record
Route::get('/retrive-first-record',[QueryBuilderController::class,'retrive_first_record']);

//Retrive using primary key id
Route::get('/retrive-using-id/{id}',[QueryBuilderController::class,'retrive_using_id']);

//retrive single value from column
//SELECT `email` FROM `users` LIMIT 1;
Route::get('/retrive-single-value-form-column',[QueryBuilderController::class,'retrive_single_value_form_column']);

//Retrive value as key value pair(associative array)
Route::get('/pluck',[QueryBuilderController::class,'pluck']);

//Select Any column
Route::get('/select-any-column',[QueryBuilderController::class,'select_any_column']);
//Select any column with distinct value
Route::get('/select-with-distinct-column-value',[QueryBuilderController::class,'select_with_distinct_column_value']);

//Select column and rename column name
Route::get('/select-any-column-alias',[QueryBuilderController::class,'select_any_column_alias']);


//Combine Select and Where
Route::get('/select-with-where',[QueryBuilderController::class,'select_with_where']);







//Aggregates Method
//count
Route::get('/aggregate-count',[QueryBuilderController::class,'aggregate_count']);
//max
Route::get('/aggregate-max',[QueryBuilderController::class,'aggregate_max']);
//min
Route::get('/aggregate-min',[QueryBuilderController::class,'aggregate_min']);
//sum
Route::get('/aggregate-sum',[QueryBuilderController::class,'aggregate_sum']);
//average
Route::get('/aggregate-avg',[QueryBuilderController::class,'aggregate_avg']);
//sum with condition
Route::get('/sum-with-condition',[QueryBuilderController::class,'sum_with_condition']);



//Ordering Grouping
//order by desc
Route::get('/order-by',[QueryBuilderController::class,'order_by']);

//latest
Route::get('/latest',[QueryBuilderController::class,'latest']);

//order by oldest
Route::get('/oldest',[QueryBuilderController::class,'oldest']);

//group by
Route::get('/group-by',[QueryBuilderController::class,'groupBy']);
//group by with having
Route::get('/group-by-having',[QueryBuilderController::class,'groupByHaving']);








//Where Clause
Route::get('/where',[QueryBuilderController::class,'where']);
//orWhere
Route::get('/orWhere',[QueryBuilderController::class,'orWhere']);
//whereBetween; select price between 1000 to 1500(include 1000 and 1500)
Route::get('/whereBetween',[QueryBuilderController::class,'whereBetween']);
//whereNotBetween; select price not between 1000 to 1500(include 1000 and 1500)
Route::get('/whereNotBetween',[QueryBuilderController::class,'whereNotBetween']);
//WhereIn select price if price=50,100,150
Route::get('/whereIn',[QueryBuilderController::class,'whereIn']);
//WhereNotIn select price if price not=50,100,150
Route::get('/whereNotIn',[QueryBuilderController::class,'whereNotIn']);
//WhereNULL
Route::get('/whereNull',[QueryBuilderController::class,'whereNull']);
//WhereNotNULL
Route::get('/whereNotNull',[QueryBuilderController::class,'whereNotNull']);
//WhereColumn(2 column equality check value)
Route::get('/whereColumn',[QueryBuilderController::class,'whereColumn']);
//whereDate Month Year(Filters records based on a specific date (including year, month, and day).)
Route::get('/where-date-month-year',[QueryBuilderController::class,'where_date_month_year']);
//Advance where using function
//If your query involves a mix of AND and OR conditions that need proper grouping
// (e.g., (A AND B) OR (C AND D)), closures help maintain clarity and
// ensure correct SQL generation.
//For Simple Query No need to use query with function
Route::get('/advance-where-no-need',[QueryBuilderController::class,'advance_where_no_need']);
Route::get('/advance-where-with-function',[QueryBuilderController::class,'advance_where_with_function']);







//take
Route::get('/take',[QueryBuilderController::class,'take']);
//skip
Route::get('/skip',[QueryBuilderController::class,'skip']);
//simple paginate
Route::get('/simple-paginate',[QueryBuilderController::class,'simple_paginate']);
//paginate
Route::get('/paginate',[QueryBuilderController::class,'paginate']);








//Join
//Inner Join(Product Table : Foreign key Category_id , Brand_id)
Route::get('/inner-join',[QueryBuilderController::class,'inner_join']);
Route::get('/left-join',[QueryBuilderController::class,'left_join']);
Route::get('/right-join',[QueryBuilderController::class,'right_join']);
Route::get('/cross-join',[QueryBuilderController::class,'cross_join']);
//The UNION operator combines the result of both SELECT statements,
//removing duplicate rows by default.
Route::get('/union',[QueryBuilderController::class,'union']);
//Advance Join
Route::get('/advance-join-using-function',[QueryBuilderController::class,'advance_join_using_function']);




//Insert
Route::post('/insert',[QueryBuilderController::class,'insert']);
//inserted and Get  Id
Route::post('/insert-get-id',[QueryBuilderController::class,'insertGetId']);
//update
Route::post('/update/{id}',[QueryBuilderController::class,'update']);
//updateOrInsert
Route::post('/update-or-insert',[QueryBuilderController::class,'updateOrInsert']);
//increment Decrement
Route::post('/increment-decrement-price',[QueryBuilderController::class,'increment_decrement_price']);
//delete
Route::post('/delete/{id}',[QueryBuilderController::class,'delete']);
//truncate(no need to execute)
Route::post('/truncate',[QueryBuilderController::class,'truncate']);



