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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//__Admin Area__
//Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.home')->middleware('Role_Is');

Route::group(['prefix' => 'admin',  'middleware' => 'Role_Is'], function()
{
    //All the routes that belongs to the group goes here
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.home');
});
