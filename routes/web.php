<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::redirect('/', '/app');

Route::get('app/{any?}', function () {
    return view('client');
});

Route::post('api/login', [AuthenticationController::class, 'Login'])->name('login');

Route::post('api/register', [AuthenticationController::class, 'Register'])->name('register');
