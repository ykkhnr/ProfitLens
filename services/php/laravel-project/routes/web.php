<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CPIController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/cpi', [CPIController::class, 'index']);
