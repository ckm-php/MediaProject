<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as Admin;
use App\Http\Controllers\Auth\AdminAuthController as AdminAuth;


Route::middleware('web')->domain(env('ADMIN_URL'))->group(function () {
	
//admin login 
Route::get('/admin',[AdminAuth::class,'getLogin']);
Route::post('admin/login', [AdminAuth::class,'postLogin'])->name('adminLoginPost');

//index page
Route::get('/userlist',[Admin::class,'index'])->name('user.list');
//insert case
Route::get('/create',[Admin::class,'create'])->name('user.create');
Route::post('/store',[Admin::class,'userAddSubmit'])->name('user.store');

//
//update case
Route::get('admin/edit/{user}',[Admin::class,'edit'])->name('user.edit');
Route::patch('admin/update/{user}',[Admin::class,'userUpdateSubmit'])->name('user.update');
//
//delet case
Route::delete('/admin/{user}',[Admin::class,'destroy'])->name('user.destroy');

//login view page
Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {	
	// Admin Dashboard    
	Route::get('dashboard',[Admin::class,'dashboard'])->name('dashboard');	
});

});

Route::get('/', function () {

    return redirect('/admin');
});