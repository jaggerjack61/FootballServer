<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ReportsController;
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
    return redirect('/login');
});
Route::get('/home', function () {
    return redirect('/login');
});

//Auth Routes
Route::get('/login',[AuthController::class,'showLogin'])->middleware('guest');
Route::get('/register',[AuthController::class,'showRegister'])->middleware('guest');
Route::post('/login',[AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('/register',[AuthController::class,'register'])->name('register')->middleware('guest');
Route::get('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');



//Player Routes
Route::get('/player',[PlayerController::class,'showProfiles'])->name('show-profiles')->middleware('auth');
Route::post('/player',[PlayerController::class,'storeProfile'])->name('store-profile')->middleware('auth');
Route::post('/player/update',[PlayerController::class,'updateProfile'])->name('update-profile')->middleware('auth');
Route::get('/player/view/{id}',[PlayerController::class,'viewProfile'])->name('view-profile')->middleware('auth');
Route::post('/player/stats',[PlayerController::class,'storeStats'])->name('store-stats')->middleware('auth');
Route::post('/player/stats-update',[PlayerController::class,'updateStats'])->name('update-stats')->middleware('auth');
Route::post('/player/achievements',[PlayerController::class,'storeAchievement'])->name('store-achievement')->middleware('auth');
Route::get('/player/claim/{profile_id}',[PlayerController::class,'claimProfile'])->name('claim-profile')->middleware('auth');
Route::get('/player/release/{profile_id}',[PlayerController::class,'releaseProfile'])->name('release-profile')->middleware('auth');








//Chat routes
Route::get('/chat',[ChatController::class,'showChats'])->name('show-chats')->middleware('auth');








//Club Routes
Route::get('/club',[ClubController::class,'showClubs'])->name('show-clubs')->middleware('auth');
Route::post('/club',[ClubController::class,'storeClub'])->name('store-club')->middleware('auth');
Route::get('/club/{id}',[ClubController::class,'viewClub'])->name('view-club')->middleware('auth');

//Player Reports
Route::get('/reports',[ReportsController::class,'showReports'])->name('show-reports')->middleware('auth');



Route::get('/offline', function () {
    return view('modules/laravelpwa/offline');
});

