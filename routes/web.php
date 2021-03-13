<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('', 'Home\HomeController@home')->name('.home');

Route::get('/login', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'Home\HomeController@dashboard')->name('dashboard');
});

Route::middleware('auth')
    ->group(base_path('routes/private/user.php'));

Route::middleware('auth')
    ->group(base_path('routes/private/memories.php'));
