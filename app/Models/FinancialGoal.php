<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialGoal extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'target_amount',
        'current_amount',
        'deadline'
    ];
}