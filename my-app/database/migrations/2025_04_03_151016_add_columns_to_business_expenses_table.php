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
        Schema::table('business_expenses', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ユーザーID（外部キー）
            $table->date('date'); // 日付
            $table->string('purpose', 255); // 用途
            $table->integer('amount'); // 金額
            $table->string('receipt')->nullable(); // 領収書（ファイルパスを保存）
            $table->string('comment', 255)->nullable(); // 申請時のコメント
            $table->softDeletes(); // `deleted_at`（論理削除用）
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_expenses', function (Blueprint $table) {
            //
        });
    }
};
