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

Route::post('login/post', 'AuthController@login');

Route::get('/register', 'AuthController@registerUI');

Route::post('register/post', 'AuthController@signUp');

/*User*/

Route::get('/users', 'UserController@index');

Route::post('user/post', 'UserController@post');

Route::post('user/delete/{id}', 'UserController@delete');

Route::post('user/update', 'UserController@update');

Route::post('user/search', 'UserController@search');

/* Recipe */

Route::get('/', 'RecipeController@index');

Route::post('recipe/post', 'RecipeController@post');

Route::post('recipe/delete/{id}', 'RecipeController@delete');

/* Ingredient */

Route::get('/ingredients', 'IngredientController@index');

Route::post('ingredients/post', 'IngredientController@post');

Route::post('ingredients/delete/{id}', 'IngredientController@delete');
