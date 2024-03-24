<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\TaskController;

Route::redirect('/', '/app');

Route::get('app/{any?}', function () {
    return view('client');
});

Route::post('api/login', [AuthenticationController::class, 'Login'])->name('login');

Route::post('api/register', [AuthenticationController::class, 'Register'])->name('register');

Route::get('api/dashboard', [DashboardController::class, 'getDashboardData'])->name('dashboard');

Route::post("api/create-task", [TaskController::class, 'createTask'])->name('create-task');
