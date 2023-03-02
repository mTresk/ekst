<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ConsumablesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SolutionsController;
use App\Http\Livewire\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/solutions', [SolutionsController::class, 'index'])->name('solutions.index');
Route::get('/solutions/{industry:slug}', [SolutionsController::class, 'show'])->name('solutions.show');

Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service/{program:slug}', [ServiceController::class, 'show'])->name('service.show');
Route::get('/consumables', [ConsumablesController::class, 'index'])->name('consumables');

Route::get('/blog', Blog::class)->name('blog.index');
Route::get('/blog/{article:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');

Route::get('/policy', [PolicyController::class, 'index'])->name('policy');

Route::post('/feedback', [FeedbackController::class, 'feedback'])->name('feedback');
Route::post('/review', [ReviewController::class, 'review'])->name('review');
