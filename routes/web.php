<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PlayerController;
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

//Auth Routes
Route::get('/login',[AuthController::class,'showLogin']);
Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');



//Player Routes
Route::get('/player',[PlayerController::class,'showProfiles'])->name('show-profiles');
Route::post('/player',[PlayerController::class,'storeProfile'])->name('store-profile');
Route::post('/player/update',[PlayerController::class,'updateProfile'])->name('update-profile');
Route::get('/player/view/{id}',[PlayerController::class,'viewProfile'])->name('view-profile');
Route::post('/player/stats',[PlayerController::class,'storeStats'])->name('store-stats');
Route::post('/player/stats-update',[PlayerController::class,'updateStats'])->name('update-stats');
Route::post('/player/achievements',[PlayerController::class,'storeAchievement'])->name('store-achievement');
Route::get('/player/claim/{profile_id}',[PlayerController::class,'claimProfile'])->name('claim-profile');
Route::get('/player/release/{profile_id}',[PlayerController::class,'releaseProfile'])->name('release-profile');








//Chat routes
Route::get('/chat',[ChatController::class,'showChats'])->name('show-chats')->middleware('auth');








//Club Routes
Route::get('/club',[ClubController::class,'showClubs'])->name('show-clubs');
Route::post('/club',[ClubController::class,'storeClub'])->name('store-club');
Route::get('/club/{id}',[ClubController::class,'viewClub'])->name('view-club');

