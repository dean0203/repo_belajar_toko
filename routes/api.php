<?php

use Illuminate\Http\Request;

Route:: post('/register' , 'UserController@register');
Route:: post('/login' , 'UserController@login');

Route:: group(['middleware' => ['jwt.verify']], function()
{
  Route:: post('/Customers' , 'CustomersController@store');
  Route:: post('/Product' , 'ProductController@store');
  Route:: post('/Orde' , 'OrdeController@store');

  Route:: get('/Customers' , 'CustomersController@show');
  Route:: post('/Customers' , 'CustomersController@store');

  Route:: get('/Product' , 'ProductController@show');
  Route:: post('/Product' , 'ProductController@store');

  Route::get('/Orde', 'OrdeController@show');
  Route::get('/Orde/{id}', 'OrdeController@detail');
  Route::post('/Orde', 'OrdeController@store');
  Route::put('/Orde/{id}', 'OrdeController@update');

  Route::delete('/Orde/{id}', 'OrdeController@destroy');
  Route::delete('/Product/{id}', 'ProductController@destroy');
  Route::delete('/Customers/{id}', 'CustomersController@destroy');
});
