<?php

declare(strict_types=1);

use App\Http\Controllers\V1\AlbumController;
use App\Http\Controllers\V1\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API V1 Routes
|--------------------------------------------------------------------------
*/

Route::apiResource('albums', AlbumController::class)->only(['index', 'show']);
Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
