<?php

use App\Http\Controllers\Dashboard\PerviousWorkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSite\HomeController;
use Illuminate\Support\Facades\Route;





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


