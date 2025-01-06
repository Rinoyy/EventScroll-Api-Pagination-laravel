<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\DashboardController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



//ini route limit
Route::post('/getLimit', [EventController::class, 'getLimit']);
Route::post('/limit', [EventController::class, 'limit']);


// ini route items
Route::post('/store', [ApiController::class, 'store']);
Route::get('/get', [ApiController::class, 'get']);
Route::get('/show/{id}', [ApiController::class, 'show']);
Route::post('/update/{id}', [ApiController::class, 'update']);
Route::delete('/delete/{id}', [ApiController::class, 'delete']);





// latihan
Route::post('/StoreLatihan', [DashboardController::class, 'store']);

Route::get('/getLatihan', [DashboardController::class, 'get']);
Route::get('/showLatihan/{id}', [DashboardController::class, 'show']);
Route::post('/updateLatihan/{id}', [DashboardController::class, 'update']);
Route::delete('/deleteLatihan/{id}', [DashboardController::class, 'delete']);

