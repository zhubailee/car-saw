<?php

use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\authController;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\SubcriteriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['checkLoginStatus:guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    Route::get('/login',[authController::class,'login'])->name('login');
    Route::get('/logout',[authController::class,'logout'])->name('logout');
});
Route::post('/login/process',[authController::class,'loginProcess'])->name('login.process');

Route::middleware(['auth','checkLoginStatus:admin'])->group(function () {
    Route::get('/dashboard',[authController::class,'dashboard'])->name('admin.dashboard');
    Route::resource('/alternative', AlternativeController::class)->except('show','edit','create');
    Route::resource('/criteria', CriteriaController::class)->except('show','edit','create');
    Route::resource('/subcriteria', SubcriteriaController::class)->except('show','edit','create');
    Route::get('/calculation',[CalculationController::class,'index'])->name('calc.index');
    Route::post('/calculation/process',[CalculationController::class,'calc'])->name('calc.process');
    Route::put('/biodata/{id}',[authController::class,'updateBiodata'])->name('biodata.update');
});