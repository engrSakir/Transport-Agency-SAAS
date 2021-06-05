<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin;

Route::group(['middleware' => 'admin', 'as' => 'admin.', 'prefix' => 'backend/admin/'], function (){

    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/package', [Admin\PackageController::class, 'index'])->name('package');
    Route::get('/company', [Admin\CompanyController::class, 'index'])->name('company.index');
    Route::post('/company', [Admin\CompanyController::class, 'update'])->name('company.update');

    Route::get('/balance-add', [Admin\BalanceController::class, 'index'])->name('balance.index');
    Route::post('/balance-add', [Admin\BalanceController::class, 'add'])->name('balance.add');

    Route::resource('branch', Admin\BranchController::class);
    Route::resource('manager', Admin\ManagerController::class);


});

