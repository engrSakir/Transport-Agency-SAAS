<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Manager;

Route::group(['middleware' => 'manager', 'as' => 'manager.', 'prefix' => 'backend/manager/'], function (){

    Route::get('/dashboard', [Manager\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/ui-autocomplete/sender-name', [Manager\InvoiceController::class, 'senderName'])->name('senderName');
    Route::post('/ui-autocomplete/receiver-name', [Manager\InvoiceController::class, 'receiverName'])->name('receiverName');
    Route::post('/ui-autocomplete/receiver-phone', [Manager\InvoiceController::class, 'receiverPhone'])->name('receiverPhone');
    Route::post('/ui-autocomplete/receiver-email', [Manager\InvoiceController::class, 'receiverEmail'])->name('receiverEmail');

    Route::resource('invoice', Manager\InvoiceController::class);

});

