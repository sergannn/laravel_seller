<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('organizations', \App\Http\Controllers\Api\OrganizationController::class);
Route::get('/statistics', [\App\Http\Controllers\Api\StatisticsController::class]);

