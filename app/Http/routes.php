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
    return view('welcome');
});

Route::post("/users/auth","UserController@auth");
Route::get("/users/logout","UserController@logout");
Route::get("/users/{id}/","UserController@read");
Route::post("/users/","UserController@create");
Route::get("/users/{id}/recipes/{rid}","RecipeController@read");
Route::get("/users/{id}/recipes/{rid}/pics/{pid}","PicController@get");
//REQUIRES MIDDLEWARE AUTHENTICATION CONTROL
Route::group(['middleware' => "ProtectedRoute"],function() {
    Route::put("/users/{id}/","UserController@update");
    Route::delete("/users/{id}/","UserController@delete");
    Route::post("/users/{id}/recipes","RecipeController@create");
});

