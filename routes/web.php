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

Route::get('/', function () {
    return view('welcome');
});

//register
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');

//login
Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store'])->name('login');

////Pwd forgot
//Route::get('/forgotPasswordLink',[ForgotPasswordLinkController::class, 'create']);
//Route::post('/forgotPasswordLink', [ForgotPasswordLinkController::class, 'store'])->name('forgotPasswordLink');
//
////reset password
//Route::get('/resetPassword',[ForgotPasswordController::class, 'reset'])->name('resetPassword');
//Route::post('/resetPassword/{token}', [ForgotPasswordController::class, 'reset'])->name('resetPassword');



//// Afficher le formulaire de demande de réinitialisation de mot de passe
//Route::get('/forgot-password', function () {
//    return view('password.email');
//})->name('password.request');
//
//// Envoyer le lien de réinitialisation de mot de passe
//Route::post('/forgot-password', function (Illuminate\Http\Request $request) {
//    $request->validate(['email' => 'required|email']);
//    $status = Password::sendResetLink($request->only('email'));
//    return $status === Password::RESET_LINK_SENT
//        ? back()->with('status', __($status))
//        : back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
//})->name('password.email');


Route::get('/reset-password/success', function () {
    return view('password.success');
})->name('password.success');

// Route for showing the form to enter the email
Route::get('/forgot-password', [ForgotPasswordLinkController::class, 'create'])
    ->name('password.request');

// Route for handling form submission
Route::post('/forgot-password', [ForgotPasswordLinkController::class, 'store'])
    ->name('password.email');

// Display the password reset form
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])
    ->name('password.reset');


// Process the password reset form submission
Route::post('/reset-password/{token}', [ForgotPasswordController::class, 'reset'])
    ->name('password.update');





//logout
Route::post('/logout', [Logoutcontroller::class, 'destroy'])->name('logout')
    ->middleware('auth');

Route::view('/home','home')->name('home');
//Route::view('/login', 'login')->name('login');
//Route::view('/register', 'register')->name('register');

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








