<?php
Route::group(['middeware'=>'guest'], function(){
    Route::post('sign-up', 'UserController@signup');

    Route::post('sign-in', 'UserController@signin');
});

Route::view('/', 'welcome');

Route::group(['middleware'=>['auth','agent']], function () {

    Route::post('recharge','UserController@recharge');

    Route::post('change-password', 'UserController@changePassword');

    Route::resource('properties', 'PropertyResource');

    Route::resource('properties.tags', 'TagResource');

    Route::resource('properties.featured', 'FeatureResource');

    Route::resource('properties.media', 'MediaResource');

    Route::delete('properties/{property}/featured', 'FeatureResource@destroy');

});
