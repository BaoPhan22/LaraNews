<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    Route::get('/loaitin/{newCate}', 'show')->name('loaitin.show');
    Route::get('/loaitin/them', 'add')->name('loaitin.add')->middleware(['auth', 'verified']);
    Route::post('/loaitin/them', 'store')->name('loaitin.store')->middleware(['auth', 'verified']);
    Route::get('/loaitin/capnhat/{newCate}', 'edit')->name('loaitin.edit')->middleware(['auth', 'verified']);
    Route::put('/loaitin/capnhat/{newCate}', 'update')->name('loaitin.update')->middleware(['auth', 'verified']);
    Route::delete('/loaitin/xoa/{newCate}', 'destroy')->name('loaitin.destroy')->middleware(['auth', 'verified']);
});

Route::resource('tin', NewsController::class)->middleware(['auth', 'verified']);

Route::resource('tin.binhluan', CommentController::class)->scoped()->middleware(['auth', 'verified']);

Route::resource('nguoidung', UserController::class)->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
