<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'payout',
        'total_hrs',
    ];
}
