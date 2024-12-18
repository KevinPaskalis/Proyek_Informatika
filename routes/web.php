<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);


//Route Kategori
route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth', 'admin']);
route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);
route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);
route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);
route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin']);
//Route Produk
route::get('add_produk', [AdminController::class, 'add_produk'])->middleware(['auth', 'admin']);
route::post('upload_produk', [AdminController::class, 'upload_produk'])->middleware(['auth', 'admin']);
route::get('view_produk', [AdminController::class, 'view_produk'])->middleware(['auth', 'admin']);
route::get('hapus_produk/{id}', [AdminController::class, 'hapus_produk'])->middleware(['auth', 'admin']);
route::get('update_produk/{id}', [AdminController::class, 'update_produk'])->middleware(['auth', 'admin']);
route::post('edit_produk/{id}', [AdminController::class, 'edit_produk'])->middleware(['auth', 'admin']);
route::get('cari_produk', [AdminController::class, 'cari_produk'])->middleware(['auth', 'admin']);
