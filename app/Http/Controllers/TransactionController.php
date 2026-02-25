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
        'debit_account_id' => 'required|exists:accounts,id',
        'credit_account_id' => 'required|exists:accounts,id',
        'amount' => 'required|numeric|min:0.01',
        'description' => 'nullable|string'
    ]);

    if ($request->debit_account_id == $request->credit_account_id) {
        return back()->withErrors('Debit and Credit accounts cannot be the same.');
    }

    $company = Company::first();

    // Create transaction
    Transaction::create([
        'company_id' => $company->id,
        'debit_account_id' => $request->debit_account_id,
        'credit_account_id' => $request->credit_account_id,
        'amount' => $request->amount,
        'description' => $request->description,
        'transaction_date' => now()
    ]);

    $debitAccount = Account::find($request->debit_account_id);
    $creditAccount = Account::find($request->credit_account_id);
    $amount = $request->amount;

    // Debit logic
    if (in_array($debitAccount->account_type, ['asset', 'expense'])) {
        $debitAccount->balance += $amount;
    } else {
        $debitAccount->balance -= $amount;
    }

    // Credit logic
    if (in_array($creditAccount->account_type, ['asset', 'expense'])) {
        $creditAccount->balance -= $amount;
    } else {
        $creditAccount->balance += $amount;
    }

    $debitAccount->save();
    $creditAccount->save();

    return redirect()->route('dashboard')->with('success', 'Transaction posted successfully.');
}
}
