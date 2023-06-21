<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\ContactController;


Auth::routes([
    'register' => true
]);


Route::group(['middleware' => ['auth']], function() {
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::resource('hero', HeroController::class);
    Route::resource('questions', QuestionsController::class);
    Route::resource('contact', ContactController::class);
});

