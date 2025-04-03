<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        //追加したカラム
        'user_id',       // ユーザーID（FK）
        'status',        // 申請状況
        'target_table',  // 申請種別
        'target_id',     // 申請対象のレコードID
        'content',       // 修正内容（JSON形式）
    ];

    protected $casts = [
        'receipt' => 'array', // 申請内容（JSON）を配列に変換
    ];

    // ユーザーとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
