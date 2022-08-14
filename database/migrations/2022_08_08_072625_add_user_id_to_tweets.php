<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tweets', function (Blueprint $table) {
            //user_idをidというカラムの下に追加する
            $table->unsignedBigInteger('user_id')->after('id');
            //usersテーブルのidカラムにuser_idカラムを関連付ける
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tweets', function (Blueprint $table) {
            //外部制約をはずす
            $table->dropForeign('tweets_user_id_foreign');
            //user_idを削除
            $table->dropColumn('user_id');
        });
    }
};
