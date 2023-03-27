<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name("home");
    Route::get('/about', 'about')->name("about");
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
