<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::view('/home','home')->name('home');
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');

//admin pages
Route::view('/adminDashboard','admin.dashboard' )->name('adminDashboard');
Route::view('/usersList','admin.users' )->name('usersList');
Route::view('/subsList','admin.subs')->name('subsList');
Route::view('/templates','admin.template')->name('templates');

//writer pages
Route::view('/writerDashboard','writer.dashboard' )->name('writerDashboard');
Route::view('/writerSubsList','writer.subs')->name('writerSubsList');
Route::view('/media','writer.media')->name('media');
Route::view('/template','writer.template')->name('template');
Route::view('/templateForm','writer.templateForm')->name('addTemplate');








