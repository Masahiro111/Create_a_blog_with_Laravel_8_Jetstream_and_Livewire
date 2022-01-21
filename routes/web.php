<?php

use App\Http\Controllers\BlogController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::resource('blog', BlogController::class);

// Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
// Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
// Route::post('blog', [BlogController::class, 'store'])->name('blog.store');
// Route::get('blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
// Route::get('blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
// Route::put('blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
// Route::delete('blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');

Route::prefix('blog')
    ->as('blog.')
    ->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/', [BlogController::class, 'store'])->name('store');
        Route::get('/{blog}', [BlogController::class, 'show'])->name('show');
        Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('edit');
        Route::put('/{blog}', [BlogController::class, 'update'])->name('update');
        Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('destroy');
    });
