<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;
    protected $fillable=[
        'account_name',
        'account_no',
        'account_parent_id',
        'account_report',
        'account_type',
        'account_level',
        'account_debit',
        'account_credit',
        'account_balance',
        'company_id'
    ];
}
