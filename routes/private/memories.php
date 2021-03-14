<?php
/**
 * Created by PhpStorm.
 * User: Betho
 * Date: 13/03/21
 * Time: 14:27
 */

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'memoirs'], function () {
    Route::group(['as' => 'memoirs'], function () {
        Route::get('', 'Memoirs\MemoirsController@index')->name('.index');
        Route::get('analyze', 'Memoirs\MemoirsController@analyze')->name('.analyze');
        Route::get('create','Memoirs\MemoirsController@create')->name('.create');
        Route::post('insert', 'Memoirs\MemoirsController@insert')->name('.insert');
        Route::delete('{id}', 'Memoirs\MemoirsController@destroy')->name('.destroy');
        Route::put('{id}', 'Memoirs\MemoirsController@update')->name('.update');
    });
});
