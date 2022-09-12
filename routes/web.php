<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;
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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/products',[AdminsController::class, 'index'])->name('admin.products');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

