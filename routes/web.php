<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;

Route::redirect('/', '/app');

Route::get('app/login', function () {
    return view('client');
});

Route::get('app/{any?}', function () {
    return view('client');
});

// Authentication Routes

Route::post('api/login', [AuthenticationController::class, 'Login'])->name('login');

Route::post('api/register', [AuthenticationController::class, 'Register'])->name('register');

// Dashboard Requests Routes

Route::get('api/dashboard', [DashboardController::class, 'getDashboardData'])->name('dashboard');

Route::post("api/create-task", [TaskController::class, 'createTask'])->name('create-task');

Route::post("api/join-team", [TeamController::class, 'joinTeam'])->name('join-team');
