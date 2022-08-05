<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tweet;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //IDをとる integer型でキャスト
        $tweetId = (int) $request->tweetId;

        //削除処理
        $tweet = Tweet::where('id',$tweetId)->firstOrFail();
        $tweet->delete();

        //削除処理は以下のコードでいける
        //Tweet::destroy($tweetId);

        return redirect()->route('tweet.index')
                        ->with('feedback.success',"つぶやきを削除しました");
    }
}
