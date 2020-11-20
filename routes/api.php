<?php

use Illuminate\Support\Facades\Route;
use Mastani\NovaPasswordReset\Http\Controllers\PasswordResetController;

Route::post('reset-password', [PasswordResetController::class, 'reset'])
    ->name('laravel-nova-reset-password');
