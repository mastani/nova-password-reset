<?php

use Illuminate\Support\Facades\Route;
use Mastani\NovaPasswordReset\Http\Controllers\PasswordResetController;

Route::post('reset-password', [PasswordResetController::class, 'reset'])
    ->name('laravel-nova-reset-password');
Route::get('min-password-size', [PasswordResetController::class, 'getMinPasswordSize'])
     ->name('laravel-nova-reset-password-min-pass-size');
