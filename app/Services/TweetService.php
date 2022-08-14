<?php

namespace App\Services;

use App\Models\Tweet;


class TweetService
{
    //一覧取得
    public function getTweets(){
        return Tweet::orderBy('created_at','DESC')->get();
    }

    //自分のtweetかあるかどうかをチェックするメソッド
    public function checkOwnTweet(int $userId, int $tweetId): bool
    {
        //tweetIdで一件取得
        $tweet = Tweet::where('id', $tweetId)->first();
        //存在しなければ false
        if(!$tweet) {
            return false;
        }
        //tweetが存在すれば、そのuser_idが同じかどうか判断して返す TRUE FALSE
        return $tweet->user_id === $userId;
    }


}
