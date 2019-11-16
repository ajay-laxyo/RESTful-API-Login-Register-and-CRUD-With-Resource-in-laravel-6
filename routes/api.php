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

Route::resource('employee', 'EmployeeController');


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');



/*

the id generated from passport

Client ID: 1
Client secret: kNwDjnyWZeFWRHn7hY9kf8fQXzuHv4UYc3deyJE2
Password grant client created successfully.
Client ID: 2
Client secret: Aj5FcsYMev5Zw0B4kb5itZoMYV4an0pPqKAOjCkm

*/