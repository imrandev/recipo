<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Auth*/
Route::get('/login', 'AuthController@index');

Route::get('/logout', 'AuthController@logout');

Route::post('login/post', 'AuthController@postLogin');

Route::get('/register', 'AuthController@register');

Route::post('register/post', 'AuthController@postRegister');

/*User*/

Route::get('/users', 'UserController@index');

Route::post('user/post', 'UserController@postUser');

Route::post('user/delete/{id}', 'UserController@deleteUser');

Route::post('user/update', 'UserController@updateUser');

Route::post('user/search', 'UserController@searchUser');


/* Recipe */

Route::get('/', 'RecipeController@index');

Route::post('recipe/post', 'RecipeController@postRecipe');

Route::post('recipe/delete/{id}', 'RecipeController@deleteRecipe');
