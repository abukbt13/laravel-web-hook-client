<?php

use App\Http\Controllers\SavingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::post('/savings', [SavingsController::class, 'store']);

Route::webhooks('/savings', 'savings');
