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
    return view('admin');
});

Route::get('','LayersController@index');
Route::post('/store','LayersController@store');
Route::get('/edit/{id}','LayersController@edit');
Route::post('/dashboard/update/{id}','LayersController@update');
Route::get('/delete/{id}','LayersController@delete');
Route::get('/recipe','LayersController@recipe');
Route::get('layers/get-product-list','LayersController@get_product_list');
Route::post('/daily-entry','RecipeController@store');
Route::get('/print/{id}','LayersController@prints');
Route::get('/recipe-details-delete/{id}','LayersController@delete_recipe_details');
Route::get('/recipe-pagination/','LayersController@pagination');
Route::get('report','LayersController@report');
Route::post('get-report','LayersController@get_report');
Route::get('change-password','LayersController@change_password')->name('change-password');
Route::post('update-password','LayersController@update_password')->name('update-password');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
