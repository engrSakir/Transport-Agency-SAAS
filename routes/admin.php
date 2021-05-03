<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin;

Route::group(['as' => 'admin.', 'prefix' => 'backend/admin/'], function (){

    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/package', [Admin\PackageController::class, 'index'])->name('package');

    Route::resource('branch', Admin\BranchController::class);
    Route::resource('manager', Admin\ManagerController::class);


});

