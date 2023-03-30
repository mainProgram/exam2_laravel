<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EndroitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ItineraireController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Itineraire;

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
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name("login");
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
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

Route::middleware('auth')->group(function () {
    Route::resource("endroit", EndroitController::class);
    Route::resource("itineraire", ItineraireController::class);
    Route::resource("course", CourseController::class);
    Route::post('/course/{id}/{etat}', [CourseController::class,'change'])->name("course.change");
    Route::resource("passagers", PassagerController::class);
    Route::resource("chauffeurs", ChauffeurController::class);
});
Route::resource("business", BusinessController::class);




