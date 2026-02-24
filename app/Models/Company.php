<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'country',
        'currency'
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
