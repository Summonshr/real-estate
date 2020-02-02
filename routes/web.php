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

    Route::view('/','dashboard');

    Route::view('contacts','app.contacts')->name('contacts');

    Route::view('profie','app.profile')->name('profile');

    Route::post('recharge','UserController@recharge')->name('recharge');

    Route::get('recharge',function(){
        auth()->user()->recharge(100);
        return back()->with('alert','success: Recharged Successfully');
    });

    Route::post('change-password', 'UserController@changePassword');

    Route::delete('properties/{property}/featured', 'FeatureResource@destroy');

});
