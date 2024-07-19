<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('Auth.loginPage');
// });



//AUTH MANUAL
Route::get('/login', [authController::class, 'index'])->name('index')->middleware('static.redirect');
Route::post('/login', [authController::class, 'login'])->name('login')->middleware('static.redirect');
Route::get('/logout', [authController::class, 'logout'])->name('logout');

// Route::post('/publish', [DashboardController::class, 'publish'])->name('publish');
// Route::post('/subscribe', [DashboardController::class, 'subscribe'])->name('subscribe');
// Route::get('/status', [DashboardController::class, 'status']);

Route::get('/relay-status', [DashboardController::class, 'showRelayStatus']);
Route::get('/sensor-status', [DashboardController::class, 'showSensorStatus']);
Route::post('/toggle-relay', [DashboardController::class, 'toggleRelayStatus']);



Route::middleware(['static.auth'])->group(function () {
    // Route::get('/', function () {
    //     return view('layouts.mainHome');
    // })->name('home');
    Route::get('/', [DashboardController::class, 'index'])->name('home');
   

});



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('articles', ArticleController::class);
