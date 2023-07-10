<?php

use App\Http\Controllers\Blade\BookingController;
use App\Http\Controllers\Blade\CompaniesController;
use App\Http\Controllers\Blade\ContactController;
use App\Http\Controllers\Blade\HeroController;
use App\Http\Controllers\Blade\LogoController;
use App\Http\Controllers\Blade\QuestionsController;
use App\Http\Controllers\Blade\StatisticsController;
use App\Http\Controllers\Blade\StoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReasonsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    Route::resource('booking', BookingController::class);
});

