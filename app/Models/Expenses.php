<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_id',
        'amount',
        'desc',
        'date',
        'company_id'
    ];

    public function account(){
        return $this->belongsTo(Accounts::class,'account_id');
    }
}
