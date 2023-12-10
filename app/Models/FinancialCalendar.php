<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialCalendar extends Model
{
    use HasFactory;
    protected $fillable=[
        'financial_year', 'financial_desc', 'start_date', 'end_date', 'is_open', 'company_id', 'added_by', 'updated_by'
    ];

    public function addedBy(){
        return $this->belongsTo(Employees::class,'added_by');
    }
    public function updatedBy(){
        return $this->belongsTo(Employees::class,'updated_by');
    }
}
