<?php

namespace App\Http\Controllers\Tweet\update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

use App\Services\TweetService;

//例外処理 404エラー
//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
//例外処理２ 403エラー
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param TweetService $tweetService idで絞り込んだ一覧取得 依存性の注入
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        //
        $tweetId = (int) $request->route('tweetId');
/*         //Tweetのidを$tweetIdで抽出して一件だけ取得
        $tweet = Tweet::where('id',$tweetId)->first();
        //$tweetの抽出結果がなければ
        if(is_null($tweet)) {
            throw new NotFoundHttpException('存在しないつぶやきです');
        } */


        //クエリビルダの取得でfirstOrFailの利用
        //検索結果が存在しない場合は
        //Illuminate\Database\Eloquent\ModelNotFoundExceptionの例外になる
        //キャッチしない場合は、自動的に４０４エラーになる
        //$tweet = Tweet::where('id',$tweetId)->firstOrFail();

        //自分のtweetがあるかどうかをチェック
        if (!$tweetService->checkOwnTweet($request->user()->id, $tweetId))
        {
            throw new AccessDeniedHttpException();
        }
        //tweetを取得 なければエラー画面を表示する
        $tweet = Tweet::where('id',$tweetId)->firstOrFail();

        return view('tweet.update')->with('tweet',$tweet);
    }
}
