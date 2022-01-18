<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as Admin;
use App\Http\Controllers\Auth\AdminAuthController as AdminAuth;


Route::middleware('web')->domain(env('ADMIN_URL'))->group(function () {
	
//admin login 
Route::get('/admin',[AdminAuth::class,'getLogin']);
Route::post('admin/login', [AdminAuth::class,'postLogin'])->name('adminLoginPost');

//login view page
Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {	
	// Admin Dashboard    
	Route::get('dashboard',[Admin::class,'dashboard'])->name('dashboard');	
});

});

Route::get('/', function () {

    return redirect('/admin');
});