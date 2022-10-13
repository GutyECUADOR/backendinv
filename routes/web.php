<?php

use App\Http\Controllers\DiasInversionController;
use App\Http\Controllers\InversionController;
use App\Http\Controllers\TipoInversionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [InversionController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/inversions/{inversion}', [InversionController::class, 'edit'])->middleware(['auth'])->name('inversions.edit');
Route::put('/inversions/{inversion}', [InversionController::class, 'update'])->middleware(['auth'])->name('inversions.update');


Route::middleware('auth')->group(function () {
    Route::resource('tipos-inversion', TipoInversionController::class);
    Route::resource('dias-inversion', DiasInversionController::class);
});

require __DIR__.'/auth.php';
