<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(dirname(__DIR__))
    ->withRouting(
        function () {
            require __DIR__.'/../routes/web.php';
        },
        __DIR__.'/../routes/web.php',  // Closure ではなく string に変更
        __DIR__.'/../routes/api.php',  // APIルートを適切に追加（Laravel 11の仕様に合わせる）
        __DIR__.'/../routes/console.php',
        null, // チャンネル（不要なら `null`）
        null, // ページ（不要なら `null`）
        '/up' // Healthチェック用ルート
    )
    ->withMiddleware(function (Middleware $middleware) {
        // カスタムミドルウェアをエイリアスで登録
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
