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
        
        Schema::create('chats', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('question_id', 20)->nullable()->default(null);
        $table->string('user_id', 20)->nullable()->default(null);
        $table->string('user_name', 20)->default('noname');
        $table->string('message', 200);
        $table->timestamp('created_at')->useCurrent()->nullable();
        $table->timestamp('updated_at')->useCurrent()->nullable();        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
};
