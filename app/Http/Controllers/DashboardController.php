<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Account;

class DashboardController extends Controller
{
public function index()
{
    $company = Company::first();

    if (!$company) {
        $company = Company::create([
            'name' => 'Mini ERP Demo Sdn Bhd',
            'country' => 'Malaysia',
            'currency' => 'MYR'
        ]);

        // Create default Cash account
        $cashAccount = \App\Models\Account::create([
            'company_id' => $company->id,
            'account_name' => 'Cash',
            'account_type' => 'asset',
            'balance' => 0
        ]);

        // Create sample invoice
        \App\Models\Invoice::create([
            'company_id' => $company->id,
            'customer_name' => 'ABC Trading',
            'amount' => 5000,
            'due_date' => now()->addDays(30)
        ]);
    }

    $accounts = $company->accounts;
    $invoices = $company->invoices;
$totalAssets = $accounts->where('account_type', 'asset')->sum('balance');

$totalRevenue = $accounts->where('account_type', 'revenue')->sum('balance');

$totalExpense = $accounts->where('account_type', 'expense')->sum('balance');

// Revenue is credit-normal
// Expense is debit-normal
$netPosition = $totalRevenue - $totalExpense;

    $outstandingReceivables = $invoices->where('status', 'unpaid')->sum('amount');
    $unpaidInvoiceCount = $invoices->where('status', 'unpaid')->count();

    return view('financial-dashboard', compact(
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
