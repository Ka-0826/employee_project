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
        Schema::table('requests', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ユーザーID（外部キー）
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // 承認状況
            $table->enum('target_table', ['users', 'transport_expenses', 'business_expenses']); // 申請種別
            $table->unsignedBigInteger('target_id'); // 申請対象のレコードID（例: 交通費の ID）
            $table->json('content'); // 修正内容（JSON形式で保存）
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requests_expenses', function (Blueprint $table) {
            //
        });
    }
};
