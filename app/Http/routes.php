<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
   return Redirect::to('login');
});
Route::get('/login', 'Controller@getLogin');
Route::post('/login', 'Controller@postLogin');
Route::get('/employee_register', 'Controller@get_employee_register');
Route::post('/employee_register', 'Controller@post_employee_register');
Route::get('/relationmanager_register', array('uses' => 'Controller@get_relationmanager_register'));
Route::post('/relationmanager_register', array('uses' => 'Controller@post_relationmanager_register'));