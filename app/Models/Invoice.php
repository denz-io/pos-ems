<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'items',
        'customer',
        'business_style',
        'tin',
        'address',
        'invoice_number',
        'terms',
        'amount_given',
        'total_sales',
        'total_sales_vat',
        'amount_due',
        'profit',
        'date',
        'change'
    ];
}
