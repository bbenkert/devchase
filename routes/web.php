<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');