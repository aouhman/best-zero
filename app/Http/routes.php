<?php
Route::group(['prefix' => 'api/v1'], function () {
    Route::get('/', function(){
        return View::make('index');
    });
    Route::resource('meeting', 'MeetingController', [
        'except' => ['edit', 'create']
    ]);

    Route::resource('meeting/registration', 'RegistrationController', [
        'only' => ['store', 'destroy']
    ]);
    Route::post('user', [
        'uses' => 'AuthController@store'
    ]);
    Route::post('user/signin', [
        'uses' => 'AuthController@signin'
    ]);

});
