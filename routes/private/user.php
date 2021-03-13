<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function () {
    Route::group(['as' => 'user'], function () {
        Route::get('', 'User\UserController@index')->name('.index');
        Route::get('create','User\UserController@create')->name('.create');
        Route::post('insert', 'User\UserController@insert')->name('.insert');
        Route::get('{id}', 'User\UserController@findById')->name('.find');
        Route::put('', 'User\UserController@update')->name('.update');
    });
});
