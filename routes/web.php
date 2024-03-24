<?php

use App\Http\Controllers\PerviousWorkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSite\HomeController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

////////////////////// Pervious work //////////////////////////////////

Route::prefix('admin')->controller(PerviousWorkController::class)->group(function (){
    Route::get('AllperviousWorks','AllperviousWorks');
    Route::get('PerviousWork','PerviousWork');


    Route::get('PerviousWork','FromPreviousWork');
    Route::post('create/PerviousWork','CreatePreviousWork');


    Route::get('edit/PerviousWork/{id}','EditPreviousWork');
    Route::put('update/PerviousWork/{id}','updatePreviousWork');


    Route::delete('delete/PerviousWork/{id}','deletePreviousWork');
});

////////////////////// Pervious work //////////////////////////////////


require __DIR__.'/admin.php';

require __DIR__.'/auth.php';
