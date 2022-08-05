<?php

namespace App\Http\Controllers\Tweet\update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
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
        $tweet = Tweet::where('id',$tweetId)->firstOrFail();

        return view('tweet.update')->with('tweet',$tweet);
    }
}
