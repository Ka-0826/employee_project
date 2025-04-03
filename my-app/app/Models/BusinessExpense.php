<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessExpense extends Model
{
    protected $fillable = [
        //追加したカラム
        'user_id',       // ユーザーID（FK）
        'date',          // 日付
        'purpose',       // 用途
        'amount',        // 金額
        'receipt',       // 領収書
        'comment',       // 申請時のコメント
    ];

    // ユーザーとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
