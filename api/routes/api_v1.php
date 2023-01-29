<?php

declare(strict_types=1);

use App\Http\Controllers\V1\AlbumController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API V1 Routes
|--------------------------------------------------------------------------
*/

Route::apiResource('albums', AlbumController::class)->only(['index', 'show']);
