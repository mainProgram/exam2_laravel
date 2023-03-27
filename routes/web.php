<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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


Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::middleware('guest')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name("home");
        Route::get('/about', 'about')->name("about");
        Route::get('/inscription/{type}', 'inscription_view')->name("register.index");
        Route::post('/inscription/{type}', 'inscription')->name("inscription");
    });

    Route::controller(PassagerController::class)->group(function () {
        Route::get('/passager', 'index')->name("passager.index");
    });

    Route::controller(ChauffeurController::class)->group(function () {
        Route::get('/chauffeur', 'index')->name("chauffeur.index");
    });

    Route::controller(BusinessController::class)->group(function () {
        Route::get('/business', 'index')->name("business.index");
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



