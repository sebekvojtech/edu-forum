<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\TopicController;
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
/*
Route::get('/', function () {
    return view('home');
});
*/
Route::get('/', [TopicController::class, 'index'])->name('home');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('topic', TopicController::class);
Route::resource('thread', ThreadController::class);
Route::resource('reply', ReplyController::class);
