<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordLinkController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\NewsletterController;





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
Route::get('/home',[NewsletterController
::class, 'index'])->name('home');

Route::post('/subscribe',[NewsletterController
::class,'subscribe']);

/*
|--------------------------------------------------------------------------
|                                Register
|--------------------------------------------------------------------------
*/
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');

/*
|--------------------------------------------------------------------------
|                                Login
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'create']);
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

Route::get('/adminDashboard', function () {
    return view('admin.dashboard');
})->name('adminDashboard')->middleware('auth', 'role:admin');


Route::middleware(['auth', 'can:assign roles', 'can:delete users', 'can:restore users'])->group(function () {
    Route::view('/usersList', 'admin.users')->name('usersList');
    Route::view('/subsList', 'admin.subs')->name('subsList');
    Route::view('/templates', 'admin.template')->name('templates');
});
/*
|--------------------------------------------------------------------------
|                                Writer Dashboard
|--------------------------------------------------------------------------
*/
//writer pages
//Route::view('/writerDashboard','writer.dashboard' )->name('writerDashboard')->middleware('auth');
Route::get('/writerDashboard', function () {
    return view('writer.dashboard');
})->name('writerDashboard')->middleware('auth', 'role:editor');


//Route::middleware(['auth', 'role:editor'])->group(function () {
//    Route::view('/writerDashboard', 'writer.dashboard')->name('writerDashboard');
//});

Route::view('/writerSubsList','writer.subs')->name('writerSubsList');
Route::view('/media','writer.media')->name('media');
Route::view('/template','writer.template')->name('template');
Route::view('/templateForm','writer.templateForm')->name('addTemplate');








