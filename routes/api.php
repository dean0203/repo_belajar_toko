<?php

use Illuminate\Http\Request;

Route:: post('/register' , 'UserController@register');
Route:: post('/login' , 'UserController@login');

Route:: group(['middleware' => ['jwt.verify']], function()
{
  Route:: group(['middleware' => ['api.superadmin']], function(){
    Route::delete('/Customers/{id}', 'CustomersController@destroy');
    Route::delete('/Orde/{id}', 'OrdeController@destroy');
    Route::delete('/Product/{id}', 'ProductController@destroy');

  });
  Route:: group(['middleware' => ['api.admin']], function(){
      Route:: post('/Customers' , 'CustomersController@store');
      Route::put('/Orde/{id}', 'OrdeController@update');

      Route:: post('/Product' , 'ProductController@store');
      Route:: put('/Product/{id}' , 'ProductController@update');

      Route:: post('/Orde' , 'OrdeController@store');
      Route:: put('/Orde/{id}', 'OrdeController@update');
  });






  Route:: get('/Customers' , 'CustomersController@show');
  Route:: get('/Customers/{id}', 'CustomersController@detail');

  Route:: get('/Product' , 'ProductController@show');
  Route:: get('/Product/{id}', 'ProductController@detail');

  Route::get('/Orde', 'OrdeController@show');
  Route::get('/Orde/{id}', 'OrdeController@detail');




});
