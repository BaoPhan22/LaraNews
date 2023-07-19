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
})->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(LoaiTinController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('admin/loaitin', 'index')->name('admin.loaitin.index');
    Route::get('admin/loaitin/{newCate}', 'show')->name('admin.loaitin.show');
    Route::get('admin/loaitin/them', 'add')->name('admin.loaitin.add');
    Route::post('admin/loaitin/them', 'store')->name('admin.loaitin.store');
    Route::get('admin/loaitin/capnhat/{newCate}', 'edit')->name('admin.loaitin.edit');
    Route::put('admin/loaitin/capnhat/{newCate}', 'update')->name('admin.loaitin.update');
    Route::delete('admin/loaitin/xoa/{newCate}', 'destroy')->name('admin.loaitin.destroy');
});

Route::controller(LoaiTinController::class)->group(function () {
    Route::get('/loaitin/{newCate}', 'show_client')->name('loaitin.show_client');
});

Route::controller(NewsController::class)->group(function () {
    Route::get('/tintuc/{tin}', 'show_client')->name('tin.show_client');
});

Route::resource('tin', NewsController::class)->middleware(['auth', 'verified']);

Route::resource('tin.binhluan', CommentController::class)->scoped()->middleware(['auth', 'verified']);

Route::resource('nguoidung', UserController::class)->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
