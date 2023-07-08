<?php

use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

Route::get('/dashboard', function () {
    // if (Auth::user()->vaitro !== 0) throw new NotFoundHttpException();
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(TinController::class)->group(function () {
    // Route::post('/orders', 'store');
});

Route::controller(LoaiTinController::class)->group(function () {
    Route::get('/loaitin', 'index')->name('loaitin.index');
    Route::get('/themloaitin', 'add')->name('loaitin.add');
    Route::get('/capnhatloaitin/{id}', 'edit')->name('loaitin.edit');
    Route::post('/themloaitin', 'store')->name('loaitin.store');
    Route::put('/capnhatloaitin', 'update')->name('loaitin.update');
});

require __DIR__ . '/auth.php';
