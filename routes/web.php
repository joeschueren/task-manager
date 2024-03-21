<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/app');

Route::get('app/{any?}', function () {
    return view('client');
});
