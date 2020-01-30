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

Route::resource('properties','PropertyResource');

Route::resource('properties.tags','TagResource');

Route::resource('properties.featured','FeatureResource');

Route::delete('properties/{property}/featured','FeatureResource@destroy');