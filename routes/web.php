<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordLinkController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\EmailListController;
use App\Http\Controllers\PdfController;







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
//redirect admin to the dashboard admin
Route::get('/adminDashboard', function () {
    return view('admin.dashboard');
})->name('adminDashboard')->middleware('auth', 'role:admin');

/*
|--------------------------------------------------------------------------
|                                Admin Actions
|-----------------------------------------------------------------
*/
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
//redirect editor to the dashboard writer
Route::get('/writerDashboard', function () {
    return view('writer.dashboard');
})->name('writerDashboard')->middleware('auth', 'role:editor');

/*
|--------------------------------------------------------------------------
|                                Writer Actions
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'can:create templates', 'can:send templates', 'can:track templates',
    'can:add medias', 'can:download users'])->group(function () {
    /////////////////////////              ADD    MEDIA                    ///////////////////////////////
    Route::post('/upload', [MediaController::class, 'upload'])->name('upload');
    //Route::post('/uploadImage', [MediaController::class, 'store'])->name('uploadImage');

    // form to add media
     Route::get('/AddMedia', [MediaController::class, 'index'])->name('addMedia');
    // For rendering the upload form
    Route::get('/media/upload', [MediaController::class,'showMediaForm'])->name('media.upload');


    // index page of lists of medias
    Route::get('/medias', [MediaController::class,'showMediaList'])->name('media');
    //delete media
    Route::delete('/media/{id}', [MediaController::class,'destroy'])->name('media.delete');


    ////////////////////////////////           Display subs           ////////////////////////////////////////
    Route::get('/subscribers', [EmailListController::class, 'showSubscribers'])->name('subscribers');
    //generate pdf
    Route::get('/generate-pdf', [PdfController::class, 'generatePdf'])->name('generate.pdf');






    // Route::view('/writerSubsList', 'writer.subs')->name('writerSubsList');
    Route::view('/template', 'writer.template')->name('template');
    Route::view('/templateForm', 'writer.templateForm')->name('addTemplate');
});











