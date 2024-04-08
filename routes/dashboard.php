<?php

use App\Http\Controllers\Dashboard\AboutUsController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\PerviousWorkController;
use App\Http\Controllers\Dashboard\PreviousWorkController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSite\HomeController;
use Illuminate\Support\Facades\Route;





// ////////////////////// Pervious work //////////////////////////////////

// Route::prefix('admin')->middleware(['admin'])->controller(PerviousWorkController::class)->group(function (){
//     Route::get('AllperviousWorks','AllperviousWorks');
//     Route::get('PerviousWork','PerviousWork');


//     Route::get('PerviousWork','FromPreviousWork');
//     Route::post('create/PerviousWork','CreatePreviousWork');


//     Route::get('edit/PerviousWork/{id}','EditPreviousWork');
//     Route::put('update/PerviousWork/{id}','updatePreviousWork');


//     Route::delete('delete/PerviousWork/{id}','deletePreviousWork');
// });

////////////////////// Pervious work //////////////////////////////////

Route::prefix('dashboard')->middleware(['admin'])->group(function () {
    Route::get('articles', [ArticleController::class, 'all_articles'])->name('all_articles');


    Route::get('create_article', [ArticleController::class, 'create_article'])->name('create_article');
    Route::post('store_article', [ArticleController::class, 'store_article'])->name('store_article');

    Route::delete('delete/{id}', [ArticleController::class, 'delete_article'])->name('delete_article');

    Route::get('edit_article/{id}', [ArticleController::class, 'edit_article'])->name('edit_article');
    Route::put('update_article/{id}', [ArticleController::class, 'update_article'])->name('update_article');

    Route::resource('previousWorks', PreviousWorkController::class);

    Route::resource('categories', CategoryController::class);
    
    Route::resource('admins', AdminController::class);

    Route::resource('setting', SettingController::class);

    Route::resource('about-us', AboutUsController::class);

    Route::resource('contact-us', ContactUsController::class);


});




