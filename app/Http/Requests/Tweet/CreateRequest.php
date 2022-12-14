<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'tweet' => 'required|max:140'
        ];
    }


    /**
     *  Requestから簡単にTweet部分を取り出せるようにする
     *
     */
    public function tweet(): string
    {
        //Requestのtweet部分を引っ張り出す
        return $this->input('tweet');
    }

    /**
     *  Requestクラスのuser関数でログインしているユーザを取得、返す
     *
     */
    public function userId(): int
    {
        return $this->user()->id;
    }


}
