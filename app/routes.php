<?php

# Login
Route::get('/', array('as' => 'signin', 'uses' => 'Controllers\AuthController@getLogin'));
Route::post('/', 'Controllers\AuthController@postLogin');
# Logout
Route::get('/logout', array('as' => 'logout', 'uses' => 'Controllers\AuthController@getLogout'));

Route::group(['prefix' => 'admin', 'before' => 'admin-auth'], function () {
    # Bug Management
    Route::group(array('prefix' => 'bugs'), function()
    {
        Route::get('/', array('as' => 'bugs', 'uses' => 'Controllers\Admin\BugsController@getIndex'));
        Route::get('create', array('as' => 'create/bug', 'uses' => 'Controllers\Admin\BugsController@getCreate'));
        Route::post('create', 'Controllers\Admin\BugsController@postCreate');
        Route::get('{bugId}/edit', array('as' => 'edit/bug', 'uses' => 'Controllers\Admin\BugsController@getEdit'));
        Route::post('{bugId}/edit', 'Controllers\Admin\BugsController@postEdit');
        Route::get('{bugId}/delete', array('as' => 'delete/bug', 'uses' => 'Controllers\Admin\BugsController@getDelete'));
    });

    # Dashboard
    Route::get('/', array('as' => 'admin', 'uses' => 'Controllers\Admin\DashboardController@getIndex'));
});


Route::group(['prefix' => 'api'], function () {
    Route::group(array('prefix' => 'bugs'), function()
    {
        Route::get('/',['as' => 'api/bugs', 'uses' => 'Controllers\Admin\Api\BugsApiController@index']);
        Route::post('{bugId}/edit',['as' => 'api/bug/edit', 'uses' => 'Controllers\Admin\Api\BugsApiController@update']);
        Route::post('{bugId}/delete',['as' => 'api/bug/delete', 'uses' => 'Controllers\Admin\Api\BugsApiController@destroy']);
    });
});

