<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/frontend.php';
require __DIR__.'/auth.php';

 Route::group(['middleware' => 'auth'], function (){
        require __DIR__.'/backend.php';
        require __DIR__.'/superadmin.php';
        require __DIR__.'/application.php';
 });

 Route::get('/backend/admin/dashboard', function (){
    echo 'admin';
 });

 Route::get('/backend/manager/dashboard', function (){
    echo 'manager';
 });

 Route::get('/dashboard', function (){
    echo 'customer';
 });

