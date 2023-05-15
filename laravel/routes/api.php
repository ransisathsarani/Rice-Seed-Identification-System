<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// http://127.0.0.1:8000/api/v1/get-rice-seed-info

Route::group(['prefix' => '/v1'], function () {
    Route::get('get-rice-seed-info', [\App\Http\Controllers\SeedImagesController::class, 'getRiceSeedInfo']);
});
