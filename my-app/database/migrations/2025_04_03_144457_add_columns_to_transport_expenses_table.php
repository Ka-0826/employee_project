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
        Schema::table('transport_expenses', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ユーザーID（外部キー）
            $table->date('date'); // 日付
            $table->boolean('is_bicycle')->default(false); // 駐輪
            $table->integer('bicycle_cost')->nullable(); // 駐輪代
            $table->boolean('is_pass')->default(false); // 定期
            $table->integer('fare')->nullable(); // 電車代
            $table->integer('total_cost')->default(0); // 合計金額
            $table->string('departure', 30); // 出発地
            $table->string('destination', 30); // 到着地
            $table->string('comment', 255)->nullable(); // 申請時のコメント
            $table->softDeletes(); // `deleted_at`（論理削除用）
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transport_expenses', function (Blueprint $table) {
            //
        });
    }
};
