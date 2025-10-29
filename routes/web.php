<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\SocialAuthController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('homepage');

    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('/register/step', [AuthController::class, 'next'])->name('register.step.submit');
    Route::post('/register/prev', [AuthController::class, 'prev'])->name('register.step.prev');

    Route::get('/states/{countryId}', [AuthController::class, 'getStates'])->name('states');
    Route::get('/cities/{stateId}', [AuthController::class, 'getCities'])->name('cities');

    Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::get('forgot-password-success', [AuthController::class, 'showForgotPasswordSuccess'])->name('password.request.success');

    Route::get('new-password', [AuthController::class, 'showNewPassword'])->name('password.new');
    Route::get('new-password-success', [AuthController::class, 'showNewPasswordSuccess'])->name('password.new.success');



    Route::get('auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
    Route::get('auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

    Route::post('user-confirmation', [AuthController::class, 'userConfirmation'])->name('user.confirmation');
});
