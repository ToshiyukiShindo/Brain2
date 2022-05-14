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
        if (Schema::hasTable('users')) {
            // テーブルが存在していればリターン
            return;
        };
        if (Schema::hasTable('password_resets')) {
            // テーブルが存在していればリターン
            return;
        };
        if (Schema::hasTable('failed_jobs')) {
            // テーブルが存在していればリターン
            return;
        };
        if (Schema::hasTable('personal_access_tokens')) {
            // テーブルが存在していればリターン
            return;
        };

        Schema::table('users', function (Blueprint $table) {
            $table->integer('manage_flag')->default('0');  //カラム追加
            $table->string('answer_category')->nullable();  //カラム追加
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
