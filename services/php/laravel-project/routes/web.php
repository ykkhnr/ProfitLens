<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CPIController;
use App\Http\Controllers\CPIAnalyzeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cpi', [CPIController::class, 'index']);
Route::get('/cpi/analyze', [CPIAnalyzeController::class, 'analyze']);
