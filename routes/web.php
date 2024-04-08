<?php

use App\Http\Controllers\Dashboard\PerviousWorkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSite\AboutController;
use App\Http\Controllers\WebSite\ArticleController;
use App\Http\Controllers\WebSite\HomeController;
use App\Http\Controllers\WebSite\RequestUserController;
use App\Http\Controllers\WebSite\WhyUsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/previousWorks/{category_id}', [HomeController::class, 'allPreviousWorks'])->name('allPreviousWorks');
Route::get('/previousWork/{previousWork_id}', [HomeController::class, 'previousWork'])->name('previousWork');

Route::get('/whyUs', [WhyUsController::class, 'index'])->name('whyUs.index');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::resource('requests', RequestUserController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/admin.php';

require __DIR__.'/auth.php';

require __DIR__.'/dashboard.php';
