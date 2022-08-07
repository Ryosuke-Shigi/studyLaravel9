<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Tweet\IndexController as TweetIndexController;
use App\Http\Controllers\Tweet\CreateController as TweetCreateController;
use App\Http\Controllers\Tweet\TweetController;
use App\Http\Controllers\Tweet\update\IndexController as UpdateIndexController;
use App\Http\Controllers\Tweet\update\PutController as UpdatePutController;
use App\Http\Controllers\Tweet\DeleteController as TweetDeleteController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
