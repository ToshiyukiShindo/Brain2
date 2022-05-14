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
        if (Schema::hasTable('questions')) {
            // テーブルが存在していればリターン
            return;
        };
        if (Schema::hasTable('chats')) {
            // テーブルが存在していればリターン
            return;
        };

        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('category')->nullable();
            $table->string('desc');
    	    $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
