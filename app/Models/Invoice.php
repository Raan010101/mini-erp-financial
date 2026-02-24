<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'company_id',
        'customer_name',
        'amount',
        'status',
        'due_date'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
