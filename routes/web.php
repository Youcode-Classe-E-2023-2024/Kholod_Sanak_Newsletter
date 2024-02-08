<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordLinkController;
use App\Http\Controllers\Auth\ForgotPasswordController;




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


/*
|--------------------------------------------------------------------------
|                                Homepage
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
});
Route::view('/home','home')->name('home');

/*
|--------------------------------------------------------------------------
|                                Register
|--------------------------------------------------------------------------
*/
Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

/*
|--------------------------------------------------------------------------
|                                Login
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login');

/*
|--------------------------------------------------------------------------
|                                Forgot password
|                                 enter & send email
|--------------------------------------------------------------------------
*/
//success page email has been sent
Route::get('/reset-password/success', function () {
    return view('password.success');
})->name('password.success');
// Route for showing the form to enter the email
Route::get('/forgot-password', [ForgotPasswordLinkController::class, 'create'])
    ->name('password.request');
// Route for handling form submission
Route::post('/forgot-password', [ForgotPasswordLinkController::class, 'store'])
    ->name('password.email');

/*
|--------------------------------------------------------------------------
|                                Forgot password
|                                 reset password
|--------------------------------------------------------------------------
*/
// Display the password reset form
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])
    ->name('password.reset');
// Process the password reset form submission
Route::post('/reset-password/{token}', [ForgotPasswordController::class, 'reset'])
    ->name('password.update');


/*
|--------------------------------------------------------------------------
|                                Logout
|--------------------------------------------------------------------------
*/
Route::post('/logout', [Logoutcontroller::class, 'destroy'])->name('logout')
    ->middleware('auth');




/*
|--------------------------------------------------------------------------
|                                Admin Dashboard
|--------------------------------------------------------------------------
*/
//admin pages
Route::view('/adminDashboard','admin.dashboard' )->name('adminDashboard')->middleware('auth');
Route::view('/usersList','admin.users' )->name('usersList');
Route::view('/subsList','admin.subs')->name('subsList');
Route::view('/templates','admin.template')->name('templates');
/*
|--------------------------------------------------------------------------
|                                Writer Dashboard
|--------------------------------------------------------------------------
*/
//writer pages
Route::view('/writerDashboard','writer.dashboard' )->name('writerDashboard')->middleware('auth');
Route::view('/writerSubsList','writer.subs')->name('writerSubsList');
Route::view('/media','writer.media')->name('media');
Route::view('/template','writer.template')->name('template');
Route::view('/templateForm','writer.templateForm')->name('addTemplate');








