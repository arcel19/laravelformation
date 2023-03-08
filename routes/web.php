<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


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
 
Route::get('/', [ListingController::class, 'index']);


Route::get('/listing/create', [ListingController::class, 'create'])->middleware('auth');


Route::post('/listing', [ListingController::class, 'store'])->middleware('auth');

Route::get('/listing/{listing}/edit', [ListingController::class,'edit'])->middleware('auth');
Route::put('/listing/{listing}', [ListingController::class,'update'])->middleware('auth');

Route::delete('/listing/{listing}', [ListingController::class, 'delete'])->middleware('auth');

Route::get('/listing/manage', [ListingController::class,'manage'])->middleware('auth');


Route::get('/listing/{listing}', [ListingController::class, 'show']);

Route::get('/register',[UserController::class,'create'])->middleware('guest');

Route::post('/users',[UserController::class,'store']);
Route::post('/logout',[UserController::class,'logout'])->middleware('auth') ;
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate',[UserController::class,'authenticate']);


 