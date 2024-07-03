<?php

use App\Http\Controllers\APIDICOMController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/status', [APIDICOMController::class, 'receiveStatus']);
