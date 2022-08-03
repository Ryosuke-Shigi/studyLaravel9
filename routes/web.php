<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Tweet\IndexController;
use App\Http\Controllers\Tweet\CreateController;
use App\Http\Controllers\Tweet\TweetController;
use App\Http\Controllers\Tweet\update\IndexController as UpdateIndexController;
use App\Http\Controllers\Tweet\update\PutController as UpdatePutController;


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

Route::get('/test/{id}/{ad}',function($sd,$sf) { return 'Hello'.$sd."   ".$sf;});

//Route::get('/tweet/{name}',IndexController::class)->name('tweet.index');

//tweet機能作成 シングルアクション
Route::get('/tweet',IndexController::class)->name('tweet.index');
//tweet投稿機能
Route::post('/tweet/create',CreateController::class)->name('tweet.create');
//tweet編集画面表示
Route::get('/tweet/update/{tweetId}',UpdateIndexController::class)->name('tweet.update.index');
//tweet編集処理
Route::post('/tweet/update/{tweetId}',UpdatePutController::class)->name('tweet.update.put')->where('tweetId','[0-9]+');



/* Route::resource('tweet',TweetController::class, ['only' => [
    'index',
    'show',
    'edit',
    'update',
    'destroy',
]]); */
