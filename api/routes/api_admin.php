<?php

declare(strict_types=1);

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin API Routes
|--------------------------------------------------------------------------
*/

Route::apiResource('albums', AlbumController::class);
Route::apiResource('customers', CustomerController::class)->only('index');
Route::apiResource('orders', OrderController::class)->only('index');
