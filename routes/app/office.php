<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Office\AuthController;
use App\Http\Controllers\Office\MainController;
use App\Http\Controllers\Office\Master\BankController;
use App\Http\Controllers\Office\Master\ProductController;

Route::group(['domain' => ''], function() {
    Route::prefix('office')->name('office.')->group(function(){
        Route::get('lang/{language}',[MainController::class, 'switch'])->name('switch.lang');
        Route::prefix('auth')->name('auth.')->group(function(){
            Route::get('',[AuthController::class, 'index'])->name('index');
            Route::post('login',[AuthController::class, 'do_login'])->name('login');
            Route::post('register',[AuthController::class, 'do_register'])->name('register');
        });
        Route::middleware(['auth:office','verified'])->group(function(){
            Route::get('dashboard', [MainController::class, 'index'])->name('dashboard');
            // MASTER
            Route::resource('product', ProductController::class);
            Route::resource('bank', BankController::class);
            Route::resource('isic-type', IsicTypeController::class);
            Route::resource('isic', IsicController::class);
            // CRM
            Route::resource('customer', CustomerController::class);
            Route::resource('partner', PartnerController::class);
            Route::resource('lead', LeadController::class);
            Route::post('lead/{lead}/accept',[LeadController::class, 'accept'])->name('lead.accept');
            Route::resource('client', ClientController::class);
            Route::get('logout',[AuthController::class, 'do_logout'])->name('auth.logout');
        });
    });
});