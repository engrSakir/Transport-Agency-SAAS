<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Manager;

Route::group(['as' => 'manager.', 'prefix' => 'backend/manager/'], function (){

    Route::get('/dashboard', [Manager\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('invoice', Manager\InvoiceController::class);
});

