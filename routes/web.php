<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::middleware(['auth'])->group(function() {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/trains', [AdminController::class, 'trains'])->name('trains');
    Route::get('/edit-train/{id}', [AdminController::class, 'editTrain'])->name('edit-train');
    Route::post('/delete-bogi/{id}', [AdminController::class, 'deleteBogi'])->name('delete-bogi');
});

require __DIR__.'/auth.php';
