<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminAuthController as AdminAuth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\PostInfoController as PostInfo;

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


Auth::routes();

// Route::middleware('web')->domain(env('WEB_URL'))->group(function () {
//     //dd('web');
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/userpost',[PostInfo::class,'postView'])->name('client.list');

//create post
Route::get('/userpost/create',[PostInfo::class,'postCreate'])->name('client.create');
Route::post('/userpost/Add',[PostInfo::class,'postAdd'])->name('client.postAdd');

//view post
Route::get('userpost/edit/{postinfo}',[PostInfo::class,'postEdit'])->name('client.view');
Route::get('userpost/destory/{postinfo}',[PostInfo::class,'postDelete'])->name('client.delete');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    //return view('auth.login');
    return view('home');
});


Auth::routes();
// Route::get('logout', [Login::class, 'logout']);
Route::post('logout', function () {
    Session()->flush();
    Auth()->logout();
    return Redirect::to('/');
})->name('logout');
