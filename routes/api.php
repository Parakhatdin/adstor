<?php

use App\Http\Controllers\API\v1\ChannelController;
use App\Http\Controllers\API\v1\PostController;
use App\Http\Controllers\API\v1\PublisherController;
use App\Http\Controllers\API\v1\StatisticController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::apiResources([
        'post' => PostController::class,
        'channel' => ChannelController::class,
        'publisher' => PublisherController::class,
    ]);
    Route::apiResource('statistic', StatisticController::class)->only(['index', 'show']);
});


