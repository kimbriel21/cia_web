<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/home', function () {
    return view('home');
});
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::resource('/member', 'Member\MemberController');
Route::resource('/ministry', 'Member\MemberController');