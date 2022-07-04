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

Route::group(['middleware' => ['web']], function () {
    //Login Routes...
    Route::get('/admin/login',[ 'uses' => 'AdminAuth\AuthController@showLoginForm', 'as' => 'admin.login'] );
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout',['uses' => 'AdminAuth\AuthController@logout', 'as' => 'admin.logout']);

    // Registration Routes...
    Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'AdminAuth\AuthController@register');

    Route::get('/admin', ['uses' => 'Admin\AdminHomeController@index', 'as' => 'admin_dashboard']);

    Route::group(['prefix'=>'department'], function() {
        Route::get('/create', [
            'as' => 'department.create',
            'uses' => 'DepartmentsController@create'
        ]);

        Route::get('/list-all', [
            'as' => 'department.index',
            'uses' => 'DepartmentsController@index'
        ]);
        
        Route::post('/store', [
            'as' => 'department.store',
            'uses' => 'DepartmentsController@store'
        ]);

        Route::get('/post-tender/add', [
            'middleware' => 'auth',
            'as' => 'department.post_tender.add',
            'uses' => 'TendersController@createPostTender'
        ]);

        Route::post('/post-tender/add', [
            'middleware' => 'auth',
            'as' => 'department.post_tender.submit',
            'uses' => 'TendersController@submitPostTender'
        ]);
        Route::get('/post-tender/view-all', [
            'middleware' => 'auth',
            'as' => 'department.post_tender.view_all',
            'uses' => 'TendersController@viewPostTender'
        ]);
        Route::get('/post-tender/edit/{num}', [
            'middleware' => 'auth',
            'as' => 'department.post_tender.edit',
            'uses' => 'TendersController@editPostTender'
        ]);
        Route::post('/post-tender/edit/{num}', [
            'middleware' => 'auth',
            'as' => 'department.post_tender.update',
            'uses' => 'TendersController@updatePostTender'
        ]);
        Route::get('/post-tender/remove/{num}', [
            'middleware' => 'auth',
            'as' => 'department.post_tender.remove',
            'uses' => 'TendersController@removePostTender'
        ]);
    });

    Route::group(['prefix'=>'tender-type'], function() {
        Route::get('/create', [
            'as' => 'tender_type.create',
            'uses' => 'TenderTypesController@create'
        ]);

        Route::get('/list-all', [
            'as' => 'tender_type.index',
            'uses' => 'TenderTypesController@index'
        ]);
        
        Route::post('/store', [
            'as' => 'tender_type.store',
            'uses' => 'TenderTypesController@store'
        ]);
    });

    Route::group(['prefix'=>'user'], function() {
        Route::get('/create', [
            'as' => 'user.create',
            'uses' => 'UsersController@create'
        ]);

        Route::get('/list-all', [
            'as' => 'user.index',
            'uses' => 'UsersController@index'
        ]);
        
        Route::post('/store', [
            'as' => 'user.store',
            'uses' => 'UsersController@store'
        ]);
    });

    Route::group(['prefix'=>'tender'], function() {
        Route::get('/create', [
            'as' => 'tender.create',
            'middleware' => ['auth'],
            'uses' => 'TendersController@create'
        ]);

        Route::get('/list-all', [
            'as' => 'tender.index',
            'middleware' => 'auth',
            'uses' => 'TendersController@index'
        ]);
        
        Route::post('/store', [
            'as' => 'tender.store',
            'middleware' => 'auth',
            'uses' => 'TendersController@store'
        ]);

        Route::get('/search', [
            'as' => 'tender.search',
            //'middleware' => 'auth',
            'uses' => 'TendersController@search_tender'
        ]);

        Route::get('/search/results', [
            'as' => 'tender.search_result',
            //'middleware' => 'auth',
            'uses' => 'TendersController@tender_search_result'
        ]);

        Route::get('/details/{num}', [
            'as' => 'tender.details',
            //'middleware' => 'auth',
            'uses' => 'TendersController@details'
        ]);

        Route::get('/corrigendum/add', [
            'as' => 'corrigendum_tender.create',
            'middleware' => 'admin',
            'uses' => 'TendersController@addCorrigendum'
        ]);

        Route::post('/corrigendum/store', [
            'as' => 'corrigendum_tender.store',
            'middleware' => 'admin',
            'uses' => 'TendersController@storeCorrigendum'
        ]);


        Route::get('/user/corrigendum/add', [
            'as' => 'corrigendum_tender.user.create',
            'middleware' => 'auth',
            'uses' => 'TendersController@addUserCorrigendum'
        ]);

        Route::post('/user/corrigendum/store', [
            'as' => 'corrigendum_tender.user.store',
            'middleware' => 'auth',
            'uses' => 'TendersController@storeUserCorrigendum'
        ]);
        Route::get('/user/tender/edit/{num}', [
            'as' => 'tender.user.edit',
            'middleware' => 'auth',
            'uses' => 'TendersController@userEdit'
        ]);

        Route::post('/user/tender/update/{num}', [
            'as' => 'tender.user.update',
            'middleware' => 'auth',
            'uses' => 'TendersController@userUpdate'
        ]);

        Route::get('/user/delete/{num}', [
            'as' => 'user.tender.delete',
            'middleware' => 'auth',
            'uses' => 'TendersController@userDelete'
        ]);

    });

});  

Route::group(['prefix'=>'admin'], function() {
    Route::group(['prefix'=>'tender'], function() {
        Route::get('/create', [
            'as' => 'admin.tender.create',
            'middleware' => ['admin'],
            'uses' => 'TendersController@adminCreate'
        ]);

        Route::post('/store', [
            'as' => 'admin.tender.store',
            'middleware' => 'admin',
            'uses' => 'TendersController@admin_store'
        ]);

        Route::post('/corrigendum/store', [
            'as' => 'corrigendum_tender.store',
            'middleware' => 'admin',
            'uses' => 'TendersController@storeCorrigendum'
        ]);

        Route::get('/list-all', [
            'as' => 'admin.tender.index',
            'middleware' => 'admin',
            'uses' => 'TendersController@adminIndex'
        ]);

        Route::get('/list-all', [
            'as' => 'admin.tender.index',
            'middleware' => 'admin',
            'uses' => 'TendersController@adminIndex'
        ]);

        Route::get('/edit/{num}', [
            'as' => 'admin.tender.edit',
            'middleware' => 'admin',
            'uses' => 'TendersController@adminEdit'
        ]);

        Route::post('/update/{num}', [
            'as' => 'admin.tender.update',
            'middleware' => 'admin',
            'uses' => 'TendersController@adminUpdate'
        ]);

        Route::get('/delete/{num}', [
            'as' => 'admin.tender.delete',
            'middleware' => 'admin',
            'uses' => 'TendersController@adminDelete'
        ]);
    });


    Route::group(['prefix'=>'post-tender'], function() {
        Route::get('/create', [
            'as' => 'admin.post_tender.create',
            'middleware' => ['admin'],
            'uses' => 'TendersController@adminCreatePostTender'
        ]);

        Route::get('/admin-view-all', [
            'as' => 'admin.post_tender.view_all',
            'middleware' => ['admin'],
            'uses' => 'TendersController@adminViewAllPosttenders'
        ]);

        Route::post('/store', [
            'as' => 'admin.post_tender.store',
            'middleware' => 'admin',
            'uses' => 'TendersController@adminStorePostTender'
        ]);

        Route::get('/edit/{num}', [
            'as' => 'admin.post_tender.edit',
            'middleware' => ['admin'],
            'uses' => 'TendersController@adminEditPosttenders'
        ]);

        Route::post('/update/{num}', [
            'as' => 'admin.post_tender.update',
            'middleware' => ['admin'],
            'uses' => 'TendersController@adminUpdatePosttenders'
        ]);

        Route::get('/delete/{num}', [
            'as' => 'admin.post_tender.remove',
            'middleware' => ['admin'],
            'uses' => 'TendersController@adminDeletePostTenders'
        ]);
    });

});
Route::get('/', [
    'as' => 'appointment.create',
    'uses' => 'HomeController@index'
]);



Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('view-all-post-tenders', ['uses' => 'TendersController@viewPostTenders', 'as' => 'all_post_tenders']);
