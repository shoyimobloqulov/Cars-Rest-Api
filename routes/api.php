<?php

use App\Http\Controllers\Api\AddPageController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CompaniesController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\QuestionsController;
use App\Http\Controllers\Api\StatisticsController;
use App\Http\Controllers\Api\StoriesController;
use App\Http\Controllers\Api\TransportController;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\LogoController;
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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

# Api Clientss
Route::get('/hero',[HeroController::class,'index']);
Route::get('/questions',[QuestionsController::class,'index']);
Route::get('/logo',[LogoController::class,'index']);
Route::get('/companies',[CompaniesController::class,'index']);
Route::get('/booking',[BookingController::class,'index']);
Route::get('/stories',[StoriesController::class,'index']);
Route::get('/contact',[ContactController::class,'index']);
Route::get('/statistics',[StatisticsController::class,'index']);
Route::get('/transport',[TransportController::class,'index']);
Route::get('/page-body',[AddPageController::class,'index']);

