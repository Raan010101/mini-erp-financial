<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'company_id',
        'debit_account_id',
        'credit_account_id',
        'amount',
        'description',
        'transaction_date'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function debitAccount()
    {
        return $this->belongsTo(Account::class, 'debit_account_id');
    }

    public function creditAccount()
    {
        return $this->belongsTo(Account::class, 'credit_account_id');
    }
}
