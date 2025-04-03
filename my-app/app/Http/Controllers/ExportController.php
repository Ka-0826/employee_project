<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Expense;

class ExportController extends Controller
{
    //CSVエクスポートの設定
    public function exportExpenses()
    {
        $expenses = Expense::all();
        $csvData = "ID,ユーザー名,金額,カテゴリ,日付\n";

        foreach ($expenses as $expense) {
            $csvData .= "{$expense->id},{$expense->user->name},{$expense->amount},{$expense->category},{$expense->date}\n";
        }

        Storage::disk('local')->put('exports/expenses.csv', $csvData);

        return response()->download(storage_path('app/exports/expenses.csv'));
    }
}
