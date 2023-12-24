<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalHeader extends Model
{
    use HasFactory;
    protected $fillable=[
        'journal_date', 
        'journal_description', 
        'journal_type', 
        'journal_report', 
        'total_debit',
        'total_credit',
        'balance', 
        'company_id', 
        'added_by', 
    ];
}
