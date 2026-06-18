<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetLimit extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'limit_amount'
    ];
}