<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\ReasonsController;
use App\Http\Controllers\StoriesController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\CompaniesController;

Auth::routes([
    'register' => true
]);


Route::group(['middleware' => ['auth']], function() {
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/home',[HomeController::class,'index']);
    Route::resource('hero', HeroController::class);
    Route::resource('questions', QuestionsController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('logo', LogoController::class);
    Route::resource('reasons', ReasonsController::class);
    Route::resource('stories', StoriesController::class);
    Route::resource('statistics', StatisticsController::class);
    Route::resource('companies', CompaniesController::class);
});

