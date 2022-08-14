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



Route::get('/test/{id}/{ad}',function($sd,$sf) { return 'Hello'.$sd."   ".$sf;});

//Route::get('/tweet/{name}',IndexController::class)->name('tweet.index');

//tweet機能作成 シングルアクション
Route::get('/tweet',TweetIndexController::class)->name('tweet.index');

Route::middleware('auth')->prefix('/tweet')->as('tweet.')->group(function () {
    //tweet投稿機能
    Route::post('/create',TweetCreateController::class)->name('create');
    //tweet編集画面表示
    Route::get('/update/{tweetId}',UpdateIndexController::class)->name('update.index');
    //tweet編集処理
    Route::put('/update/{tweetId}',UpdatePutController::class)->name('update.put')->where('tweetId','[0-9]+');
    //Tweet削除処理
    Route::delete('/delete/tweetId}',TweetDeleteController::class)->name('delete');

});
