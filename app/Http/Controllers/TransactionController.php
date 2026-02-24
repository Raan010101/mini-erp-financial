<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create()
    {
        $company = Company::first();
        $accounts = $company->accounts;

        return view('transactions.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_id' => 'required',
            'type' => 'required',
            'amount' => 'required|numeric|min:1'
        ]);

        $company = Company::first();

        Transaction::create([
            'company_id' => $company->id,
            'account_id' => $request->account_id,
            'type' => $request->type,
            'amount' => $request->amount,
            'transaction_date' => now()
        ]);

        return redirect('/');
    }
}
