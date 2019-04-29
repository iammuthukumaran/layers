<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin','LayersController@index');
Route::post('/store','LayersController@store');
Route::get('/edit/{id}','LayersController@edit');
Route::post('{id}/dashboard/update/','LayersController@update');
Route::get('/delete/{id}','LayersController@delete');
Route::get('/recipe','LayersController@recipe');
Route::get('layers/get-product-list','LayersController@get_product_list');
Route::post('/daily-entry','RecipeController@store');
Route::get('/print/{id}','LayersController@prints');
Route::get('/recipe-details-delete/{id}','LayersController@delete_recipe_details');
Route::get('/recipe-pagination/','LayersController@pagination');




