<?php

Route::post('sign-up','UserController@signup');

Route::post('sign-in','UserController@signin');

Route::post('change-password','UserController@changePassword');

Route::resource('properties','PropertyResource');

Route::resource('properties.tags','TagResource');

Route::resource('properties.featured','FeatureResource');

Route::delete('properties/{property}/featured','FeatureResource@destroy');