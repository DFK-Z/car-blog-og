<?php

use App\Http\Controllers\Articles\ArticlesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Service\ServiceController;
use Illuminate\Support\Facades\Route;

Route::namespace('Articles')->name('articles.')->group(function(){
    Route::get('/articles', [ArticlesController::class, 'index'])->name('index');
    Route::get('/articles/{id}/show', [ArticlesController::class, 'show'])->name('show');
});

Route::namespace('Categories')->name('categories.')->group(function(){
    Route::get('/categories', [CategoryController::class, 'index'])->name('index');
    Route::get('/categories/{id}/category-show', [ArticlesController::class, 'CategoryPost'])->name('CategoryPost');

});

Route::namespace('Contact')->name('contact.')->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('index');
});

Route::namespace('Service')->name('service.')->group(function () {
    Route::get('/service', [ServiceController::class, 'index'])->name('index');
    Route::get('/service/{id}/show', [ServiceController::class, 'show'])->name('show');
});
