<?php

use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => ''], function () {
    Route::get('/', HomeController::class)->name('site.home');

    # Categorias
    Route::get('produtos', [CategoryController::class, 'index'])->name('site.products');
    Route::get('produtos/{category:slug}', [CategoryController::class, 'show'])->name('site.products.category');

    # Blog
    Route::get('blog', BlogController::class)->name('site.blog');

    # Sobre
    Route::view('sobre', 'site.about.index')->name('site.about');

    # Contato
    Route::get('contato', [ContactController::class, 'index'])->name('site.contact');
    Route::post('contato', [ContactController::class, 'form'])->name('site.contact.form');

});
