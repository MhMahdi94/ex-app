<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountLog extends Model
{
    use HasFactory;
    protected $fillable=[
        'date',
        'account_id',
        'desc',
        'debit',
        'credit',
        'operation',
        'company_id'
    ];
}
