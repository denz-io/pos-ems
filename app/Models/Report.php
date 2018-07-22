<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'report_start',
        'report_end',
        'total_amount',
        'total_earned',
    ];

}
