<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSite\HomeController;
use App\Http\Controllers\Admin\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('website');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('dashboard')->group(function () {
    Route::get('articles', [ArticleController::class, 'all_articles'])->name('all_articles');


    Route::get('create_article', [ArticleController::class, 'create_article'])->name('create_article');
    Route::post('store_article', [ArticleController::class, 'store_article'])->name('store_article');

    Route::delete('delete/{id}', [ArticleController::class, 'delete_article'])->name('delete_article');

    Route::get('edit_article/{id}', [ArticleController::class, 'edit_article'])->name('edit_article');
    Route::put('update_article/{id}', [ArticleController::class, 'update_article'])->name('update_article');

});


require __DIR__.'/admin.php';

require __DIR__.'/auth.php';