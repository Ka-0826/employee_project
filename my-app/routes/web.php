<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // return view('dashboard');

    //  ロールごとのリダイレクトを追加
    $user = Auth::user();
    
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    
    return redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 管理者用ダッシュボード
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

// 一般ユーザー用ダッシュボード
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'role:user'])->name('user.dashboard');

//CSVエクスポートの設定
Route::get('/export-expenses', [ExportController::class, 'exportExpenses'])->name('export.expenses');

// 認証が必要なルートグループ
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//ファイルアップロードの追加設定
Route::post('/upload-receipt', [ReceiptController::class, 'upload'])->name('upload.receipt');

require __DIR__.'/auth.php';



Route::get('/send-test-mail', function () {
    Mail::raw('これはMailpit経由で送信されたテストメールです。', function ($message) {
        $message->to('test@example.com')
                ->subject('【テスト】Mailpitからのメール');
    });

    return 'メール送信完了！（Mailpitで確認してね）';
});

