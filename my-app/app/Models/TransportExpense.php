<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportExpense extends Model
{
    protected $fillable = [
        //追加したカラム
        'user_id',       // ユーザーID（FK）
        'date',          // 日付
        'is_bicycle',    // 駐輪
        'bicycle_cost',  // 駐輪代
        'is_pass',       // 定期
        'fare',          // 電車代
        'total_cost',    // 合計金額（自動計算）
        'departure',     // 出発地
        'destination',   // 到着地
        'comment',       // 申請時のコメント
    ];

    // ユーザーとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
