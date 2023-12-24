<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'journal_account_no', 
        'journal_debit', 
        'journal_credit', 
        'journal_description', 
        'descriprtion',
        'currency',
        'journal_no',
    ];
}
