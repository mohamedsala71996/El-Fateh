<?php

use App\Http\Controllers\Dashboard\AboutUsController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\BranchController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\MediaFileController;
use App\Http\Controllers\Dashboard\PerviousWorkController;
use App\Http\Controllers\Dashboard\PhoneNumberController;
use App\Http\Controllers\Dashboard\PreviousWorkController;
use App\Http\Controllers\Dashboard\RequestController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\SocialMediaController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\WhyUsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSite\HomeController;
use Illuminate\Support\Facades\Route;




Route::prefix('/dashboard')->middleware(['admin'])->group(function () {
    Route::get('articles', [ArticleController::class, 'all_articles'])->name('all_articles');

    Route::get('create_article', [ArticleController::class, 'create_article'])->name('create_article');

    Route::post('store_article', [ArticleController::class, 'store_article'])->name('store_article');

    Route::delete('delete/{id}', [ArticleController::class, 'delete_article'])->name('delete_article');

    Route::get('edit_article/{id}', [ArticleController::class, 'edit_article'])->name('edit_article');

    Route::put('update_article/{id}', [ArticleController::class, 'update_article'])->name('update_article');

    Route::get('comments/{id}', [ArticleController::class, 'show_comments'])->name('show_comments');

    Route::get('pending_comments', [ArticleController::class, 'pending_comments'])->name('pending_comments');

    Route::put('comment_controll/{id}', [ArticleController::class, 'comment_controll'])->name('comment_controll');
    
    Route::delete('comments/{id}', [ArticleController::class, 'comment_destroy'])->name('comments.destroy');

    Route::resource('previousWorks', PreviousWorkController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('admins', AdminController::class);

    Route::resource('users', UserController::class);

    Route::resource('setting', SettingController::class);

    Route::resource('about-us', AboutUsController::class);

    Route::resource('contact-us', ContactUsController::class);

    Route::resource('reasons', WhyUsController::class);

    Route::resource('contactRequest', RequestController::class);

    Route::resource('media-files', MediaFileController::class);

    Route::resource('social-media', SocialMediaController::class);

    Route::resource('branches', BranchController::class);

    Route::resource('phone-numbers', PhoneNumberController::class);

    Route::get('show-branches', [PhoneNumberController::class, 'showBranches'])->name('show_branches');


});




