<?php

use Illuminate\Support\Facades\Route;

Route::post('reset-password', '\Mastani\NovaPasswordReset\Http\Controllers\PasswordResetController@reset');
