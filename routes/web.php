<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'index'])->name('index');
Route::get('/index', [AdminController::class, 'showIndex'])->name('index-page');
Route::get('/blog2', [AdminController::class, 'blog2'])->name('blog2');

// เอา .name('author.') ออก เพื่อให้เรียก route('insert') ได้ตามปกติ
Route::prefix('author')->group(function () {
    Route::get('/change/{id}', [AdminController::class, 'change'])->name('change');
    Route::get('/about', [AdminController::class, 'about'])->name('about');
    Route::get('/blog', [AdminController::class, 'blog'])->name('blog');
    Route::get('/insert', [AdminController::class, 'create'])->name('create');
    Route::post('/insert', [AdminController::class, 'insert'])->name('insert');
    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/back', [AdminController::class, 'goBack'])->name('back');