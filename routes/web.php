<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
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
//Route::get('/', [AlbumController::class,'homepage'])->name('homepage');

Auth::routes();

Route::get('/create', [AlbumController::class,'create']);
Route::post('/create/check', [AlbumController::class,'create_check']);
Route::get('/change/{id}', [AlbumController::class,'change'])->name('change');
Route::get('/delete/{id}', [AlbumController::class,'delete'])->name('delete');
Route::post('/change/{id}/update', [AlbumController::class,'change_id'])->name('change_id');

Route::get('/', [AlbumController::class,'homepage'])->name('homepage');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('/home', [App\Http\Controllers\albumController::class, 'homepage'])->name('home');
