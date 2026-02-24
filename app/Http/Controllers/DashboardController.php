<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Account;

class DashboardController extends Controller
{
public function index()
{
    $company = \App\Models\Company::first();

    if (!$company) {
        return "No company data found.";
    }

    $accounts = $company->accounts;
    $invoices = $company->invoices;

    $totalAssets = $accounts->where('account_type', 'asset')->sum('balance');
    $totalRevenue = $accounts->where('account_type', 'revenue')->sum('balance');
    $totalExpense = $accounts->where('account_type', 'expense')->sum('balance');

    $netPosition = $totalRevenue - $totalExpense;

    $outstandingReceivables = $invoices->where('status', 'unpaid')->sum('amount');
    $unpaidInvoiceCount = $invoices->where('status', 'unpaid')->count();

    return view('dashboard', compact(
        'company',
        'totalAssets',
        'totalRevenue',
        'totalExpense',
        'netPosition',
        'outstandingReceivables',
        'unpaidInvoiceCount'
    ));
}
}
