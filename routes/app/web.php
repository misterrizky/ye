<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\MainController;

Route::group(['domain' => ''], function() {
    Route::prefix('')->name('web.')->group(function(){
        Route::get('',[MainController::class, 'index'])->name('home');
        Route::get('abouts',[MainController::class, 'about'])->name('about');
        Route::get('services',[MainController::class, 'service'])->name('service');
        Route::get('case-studies',[MainController::class, 'case'])->name('case');
        Route::get('contacts',[MainController::class, 'contact'])->name('contact');
        Route::get('lang/{language}',[MainController::class, 'switch'])->name('switch.lang');
    });
});