<?php

use Illuminate\Support\Facades\Route;



//* dashboard all route */
Route::group(['prefix'=>'version8','middleware' => ['admin']], function() {
    /* dashboard */
    Route::get('/back-end', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    //about us
    Route::get('abouts',[App\Http\Controllers\Admin\AboutController::class,'index']);
    Route::get('about/create',[App\Http\Controllers\Admin\AboutController::class,'create']);
    Route::post('about/store',[App\Http\Controllers\Admin\AboutController::class,'store']);
    Route::get('about/edit/{id}',[App\Http\Controllers\Admin\AboutController::class,'edit']);
    Route::post('about/update/{id}',[App\Http\Controllers\Admin\AboutController::class,'update']);
    Route::get('about/delete/{id}',[App\Http\Controllers\Admin\AboutController::class,'destroy']);
    Route::get('about/show/{id}',[App\Http\Controllers\Admin\AboutController::class,'show']);

});

