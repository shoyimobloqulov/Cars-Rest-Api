<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CompaniesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HeroController;

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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

# Api Clients
Route::get('/hero',[HeroController::class,'index']);
Route::get('/companies',[CompaniesController::class,'index']);
Route::get('/booking',[BookingController::class,'index']);
