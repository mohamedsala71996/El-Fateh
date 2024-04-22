<?php

use App\Http\Controllers\Dashboard\PerviousWorkController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSite\AboutController;
use App\Http\Controllers\WebSite\ArticleController;
use App\Http\Controllers\WebSite\HomeController;
use App\Http\Controllers\WebSite\RequestUserController;
use App\Http\Controllers\WebSite\WhyUsController;
use Illuminate\Support\Facades\App;
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

// Route::get('/{locale}', function (string $locale) {
//     if (!in_array($locale, ['en', 'ar'])) {
//         abort(400);
//     }
//     return redirect()->back();
// })->middleware(['locale'])->name('localeChange');

Route::get('/localization/{locale}',[LocaleController::class, 'changeLocale'])->name('localeChange');

// Route::get('/', function(){

//     return redirect()->to(session('locale'));
// });


    Route::get('/', [HomeController::class, 'index'])->name('website');

    Route::get('/previousWorks/{category_id}', [HomeController::class, 'allPreviousWorks'])->name('allPreviousWorks');
    
    Route::get('/previousWork/{previousWork_id}', [HomeController::class, 'previousWork'])->name('previousWork');
    
    Route::get('/whyUs', [WhyUsController::class, 'index'])->name('whyUs.index');
    
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

    Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

    Route::post('/comments', [ArticleController::class, 'store'])->name('comments.store');
    
    Route::resource('requests', RequestUserController::class);


require __DIR__.'/admin.php';

require __DIR__.'/auth.php';

require __DIR__.'/dashboard.php';
