<?php

use Illuminate\Support\Facades\Route;
use App\Models\Company;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;


Route::get('/', [DashboardController::class, 'index']);


Route::get('/api/financial-summary', function () {
    $company = Company::first();

    if (!$company) {
        return response()->json(['error' => 'No company found'], 404);
    }

    $accounts = $company->accounts;
    $invoices = $company->invoices;

    return response()->json([
        'company' => $company->name,
        'total_assets' => $accounts->where('account_type', 'asset')->sum('balance'),
        'total_revenue' => $accounts->where('account_type', 'revenue')->sum('balance'),
        'total_expense' => $accounts->where('account_type', 'expense')->sum('balance'),
        'outstanding_receivables' => $invoices->where('status', 'unpaid')->sum('amount'),
    ]);
});

Route::get('/transactions/create', [TransactionController::class, 'create']);
Route::post('/transactions', [TransactionController::class, 'store']);
