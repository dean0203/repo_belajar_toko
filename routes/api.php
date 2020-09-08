<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route:: post('/Customers' , 'CustomersController@store');
Route:: get('/Customers', 'CustomersController@show');
Route:: get('/customers/{id}', 'ordeController@detail');

Route:: post('/Orde' , 'OrdeController@store');
Route::get('/Orde', 'OrdeController@show');
Route::get('/Orde/{id}', 'OrdeController@detail');
Route::put('/Orde/{id}', 'OrdeController@update');

Route:: post('/Product' , 'ProductController@store');
Route:: get ('/Product' , 'ProductController@show');
