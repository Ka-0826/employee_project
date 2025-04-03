<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('role')->default(2); // 1: 管理者, 2: ユーザー
            $table->string('first_name', 20); // 姓
            $table->string('last_name', 20); // 名
            $table->tinyInteger('sex')->default(1); // 1: 男性, 2: 女性
            $table->string('postal_code', 7); // 郵便番号
            $table->string('prefecture', 20); // 都道府県
            $table->string('address1', 20); // 市町村
            $table->string('address2', 255); // 住所
            $table->date('hire_date'); // 入社日
            $table->text('comment')->nullable(); // 申請時のコメント
            $table->softDeletes(); // `deleted_at` の論理削除用
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
