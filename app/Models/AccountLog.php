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
        'account_report',
        'desc',
        'debit',
        'credit',
        'operation',
        'company_id'
    ];

    public function account(){
        return $this->belongsTo(Accounts::class,'account_id','account_no');
    }

    public function operationName(){
        return $this->belongsTo(AccountOperation::class,'operation');
    }
}
