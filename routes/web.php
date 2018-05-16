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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Recipe routes:

Route::get('/recept', 'RecipeController@index');

Route::get('/recept/{id}', 'RecipeController@show');

// Category routes:

Route::get('/kategori', 'CategoryController@index');

Route::get('/kategori/{id}', 'CategoryController@show');

// Week plan routes:

Route::get('/veckoplan', 'WeekPlanController@index');

Route::get('/veckoplan/{id}', 'WeekPlanController@show');

// Routes that require login:

Route::middleware(['auth'])->group(function () {

    // Recipe routes:

    Route::get('/skapa-recept', 'RecipeController@create');

    Route::post('/recept', 'RecipeController@store');

    Route::get('/recept/{id}/redigera', 'RecipeController@edit');

    Route::put('/recept/{id}', 'RecipeController@update');

    Route::delete('/recept/{id}', 'RecipeController@destroy');

    // Category routes:

    Route::get('/skapa-kategori', 'CategoryController@create');

    Route::post('/kategori', 'CategoryController@store');

    Route::get('/kategori/{id}/redigera', 'CategoryController@edit');

    Route::put('/kategori/{id}', 'CategoryController@update');

    Route::delete('/kategori/{id}', 'CategoryController@destroy');

    // Week plan routes:

    Route::get('/skapa-veckoplan', 'WeekPlanController@create');

    Route::post('/veckoplan', 'WeekPlanController@store');

    Route::get('/veckoplan/{id}/redigera', 'WeekPlanController@edit');

    Route::put('/veckoplan/{id}', 'WeekPlanController@update');

    Route::delete('/veckoplan/{id}', 'WeekPlanController@destroy');
});
