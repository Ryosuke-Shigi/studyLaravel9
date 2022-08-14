<?php

namespace App\Models;

use Database\Factories\TweetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;//トレイト
    protected $fillable = ['content'];//ホワイトリスト

    //ファクトリー関連付け
    protected static function newFactory()
    {
        return TweetFactory::new();
    }

    //たった一つのUserと関連付けている
    //UserからはhasManyで関連付けられている
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
