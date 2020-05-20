<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Referencias para la creacion del ejemplo
// https://blog.nexlab.dev/tech/2019/05/30/utiliza-jwt-con-laravel-para-apis.html
// https://www.nigmacode.com/laravel/JWT-en-Laravel

// Estas rutas se pueden acceder sin proveer de un token válido.
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::get('/home', 'ProductController@home');

// Estas rutas requiren de un token válido para poder accederse.
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('/logout', 'AuthController@logout');
    Route::get('/products', 'ProductController@getProducts');
    Route::get('/product', 'ProductController@getProduct');
});
