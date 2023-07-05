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
use App\Http\Controllers\ApiUserController;

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

    Route::get('/api-users',[ApiUserController::class,'index'])->name('api-userIndex');
    Route::get('/api-user/add',[ApiUserController::class,'add'])->name('api-userAdd');
    Route::post('/api-user/create',[ApiUserController::class,'create'])->name('api-userCreate');
    Route::get('/api-user/show/{id}',[ApiUserController::class,'show'])->name('api-userShow');
    Route::get('/api-user/{id}/edit',[ApiUserController::class,'edit'])->name('api-userEdit');
    Route::post('/api-user/update/{id}',[ApiUserController::class,'update'])->name('api-userUpdate');
    Route::delete('/api-user/delete/{id}',[ApiUserController::class,'destroy'])->name('api-userDestroy');
    Route::delete('/api-user-token/delete/{id}',[ApiUserController::class,'destroyToken'])->name('api-tokenDestroy');
});

