<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/feed', [BlogController::class, 'rss'])->name('blog.rss');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/about', [StaticPageController::class, 'about'])->name('about');
