<?php
Route::group(['middeware'=>'guest'], function(){
    Route::post('sign-up', 'UserController@signup')->name('post:sign-up');

    Route::post('sign-in', 'UserController@signin')->name('post:sign-in');

    Route::view('log-in','auth.login')->name('login');

    Route::view('sign-up','auth.sign-up')->name('sign-up');

    Route::get('log-out','UserController@logout')->name('logout');
});

Route::group(['middleware'=>['auth']], function () {

    Route::get('property-meta/{property}/media','PropertyResource@media')->name('properties.media');

    Route::resource('properties', 'PropertyResource');

    Route::resource('properties.tags', 'TagResource');

    Route::resource('properties.featured', 'FeatureResource');

    Route::resource('properties.media', 'MediaResource');

    Route::resource('sites','SiteResource');

    Route::resource('themes','ThemeResource');

    Route::view('/','dashboard');

    Route::post('profile-picture','UserController@profiePic')->name('profile-picture');

    Route::view('profile','default')->name('profile');

    Route::post('profile','UserController@updateProfile')->name('profile.update');

    Route::post('recharge','UserController@recharge')->name('recharge');

    Route::view('recharge','default')->name('recharge');

    Route::post('change-password', 'UserController@changePassword');

    Route::delete('properties/{property}/featured', 'FeatureResource@destroy');

});
