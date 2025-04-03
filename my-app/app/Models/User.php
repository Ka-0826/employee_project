<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    //SoftDeletes:論理削除（deleted_at)

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        //'name',
        'email',
        'password',
        //追加したカラム
        'role',          // 役割
        'first_name',    // 姓
        'last_name',     // 名
        'sex',           // 性別
        'postal_code',   // 郵便番号
        'prefecture',    // 都道府県
        'address1',      // 市町村
        'address2',      // 住所
        'email',         // メールアドレス
        'password_hash', // パスワード
        'hire_date',     // 入社日
        'comment',       // 申請時のコメント
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
