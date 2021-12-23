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


Route::name('Site')->group(function () {
    Route::get('/', HomeController::class)->name('home');

    # Categorias
    Route::get('produtos', [CategoryController::class, 'index'])->name('category.index');
    Route::get('produtos/{slug}', [CategoryController::class, 'show'])->name('category.show');

    # Blog
    Route::get('blog', BlogController::class)->name('blog.index');

    # Sobre
    Route::view('sobre', 'site.about.index');

    # Contato
    Route::get('contato', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contato', [ContactController::class, 'form'])->name('contact.form');

});
