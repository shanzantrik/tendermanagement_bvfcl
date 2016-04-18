<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/admin/login','Adminauth\AuthController@showLoginForm');
Route::post('/admin/login','Adminauth\AuthController@login');
Route::get('/admin/password/reset','Adminauth\PasswordController@resetPassword');

Route::group(['middleware' => ['admin']], function () {
    //Login Routes...
    Route::get('/admin/logout','Adminauth\AuthController@logout');
	
    // Registration Routes...
    Route::get('admin/register', 'Adminauth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'Adminauth\AuthController@register');

    Route::get('/admin', 'Admin\AdminHomeController@index');
});
Route::get('/', [
    'as' => 'appointment.create',
    'uses' => 'HomeController@index'
]);

Route::group(['middleware' => ['admin', 'user']], function () {
    
});
Route::post('appointment/store', [
            'as' => 'appointment.store',
            'uses' => 'AppointmentsController@store'
        ]);
Route::get('/gpass', function () {
    return $password = bcrypt('it_arunachal');
});
Route::group(['middleware' => 'web'], function () {
    Route::auth();
	Route::get('/home', 'HomeController@index');
});

Route::group(['prefix'=>'appointment'], function() {
    Route::get('/list-all', [
        'as' => 'appointment.index',
        'uses' => 'AppointmentsController@index'
    ]);
    
    Route::post('/store', [
        'as' => 'appointment.store',
        'uses' => 'AppointmentsController@store'
    ]);

    Route::get('/view/{num}', [
        'as' => 'appointment.view',
        'uses' => 'AppointmentsController@view'
    ]);
});
