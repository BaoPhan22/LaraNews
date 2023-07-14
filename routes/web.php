<?php

use App\Http\Controllers\BinhLuanController;
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

Route::controller(LoaiTinController::class)->group(function () {
    Route::get('/loaitin', 'index')->name('loaitin.index');
    Route::get('/loaitin/them', 'add')->name('loaitin.add');
    Route::post('/loaitin/them', 'store')->name('loaitin.store');
    Route::get('/loaitin/capnhat/{newCate}', 'edit')->name('loaitin.edit');
    Route::put('/loaitin/capnhat/{newCate}', 'update')->name('loaitin.update');
    Route::delete('/loaitin/xoa/{newCate}', 'destroy')->name('loaitin.destroy');
});

Route::resource('tin', TinController::class);

Route::resource('tin.binhluan', BinhLuanController::class)->scoped();

require __DIR__ . '/auth.php';
