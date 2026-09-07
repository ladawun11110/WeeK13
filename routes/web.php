<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;


Route::get('/', [AdminController::class, 'index'])->name('index');
Route::get('/change/{id}', [AdminController::class, 'index'])->name('change');
Route::get('/index', [AdminController::class, 'showIndex'])->name('index-page');
Route::get('/about', [AdminController::class, 'about'])->name('about');
Route::get('/blog', [AdminController::class, 'blog'])->name('blog');
Route::get('/blog2', [AdminController::class, 'blog2'])->name('blog2');
Route::get('/insert', [AdminController::class, 'create'])->name('create');
Route::post('/insert', [AdminController::class, 'insert'])->name('insert');
Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

