<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\FrontendController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::post('/check', [FrontendController::class, 'check']);


Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/trains', [TrainController::class, 'trains'])->name('trains');
    Route::get('/add-train', [TrainController::class, 'addTrain'])->name('add-train');
    Route::post('/save-train', [TrainController::class, 'saveTrain'])->name('save-train');
    Route::get('/edit-train/{id}', [TrainController::class, 'editTrain'])->name('edit-train');
    Route::post('/delete-bogi/{id}', [TrainController::class, 'deleteBogi'])->name('delete-bogi');
    Route::post('/add-bogi/{train_id}', [TrainController::class, 'addBogi'])->name('add-bogi');

    Route::get('/list-stations', [StationController::class, 'listStations']);
});

require __DIR__.'/auth.php';
