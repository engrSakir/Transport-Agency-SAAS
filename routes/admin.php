<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin;

Route::group(['as' => 'admin.', 'prefix' => 'backend/admin/'], function (){

        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');


});

