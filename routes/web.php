<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\Profile2Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesanController;
use App\http\Controllers\HomeController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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




Route::middleware('auth')->group(function () {
        // Route untuk halaman profil (index)
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    
    // Route untuk mengedit profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Route untuk memperbarui profile (menggunakan PATCH)
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Route untuk menghapus profile (menggunakan DELETE)
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('pesan/{id}', [PesanController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('pesan');

Route::post('pesan/{id}', [PesanController::class, 'pesan'])
    ->middleware(['auth', 'verified']);

Route::get('/check-out', [PesanController::class, 'checkOut'])
    ->middleware(['auth', 'verified'])
    ->name('checkOut');

Route::delete('/checkOut/delete/{id}', [PesanController::class, 'delete'])
    ->middleware(['auth', 'verified'])
    ->name('checkOut.delete');

Route::get('/konfirmasi-checkOut', [PesanController::class, 'konfirmasi'])
    ->middleware(['auth', 'verified'])
    ->name('konfirmasi.checkOut');

Route::prefix('profile2')->group(function () {
        Route::patch('/update', [Profile2Controller::class, 'update'])->name('profile2.update');
    });

Route::get('/history', [HistoryController::class, 'index'])->name('history.index');

Route::get('/history/{id}', [HistoryController::class, 'detail'])->name('history.detail');





    });
    
    

require __DIR__.'/auth.php';


