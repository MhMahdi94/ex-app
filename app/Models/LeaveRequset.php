<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequset extends Model
{
    use HasFactory;
    protected $fillable = [
        'startLeave',
        'endLeave',
        'leaveType',
        'reason',
        'employee_id',
        'company_id'
    ];
    public function employee(){
        return $this->belongsTo(Employees::class,'employee_id');
    }

    public function getLeaveType(){
        return $this->belongsTo(LeaveType::class,'leaveType');
    }
}
