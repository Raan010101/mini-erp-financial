<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'company_id',
        'account_id',
        'type',
        'amount',
        'description',
        'transaction_date'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    protected static function booted()
{
    static::created(function ($transaction) {
        $account = $transaction->account;

        if ($transaction->type === 'debit') {
            $account->balance += $transaction->amount;
        } else {
            $account->balance -= $transaction->amount;
        }

        $account->save();
    });
}
}
