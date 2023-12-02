<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequset extends Model
{
    use HasFactory;

    public function employee(){
        return $this->belongsTo(Employees::class);
    }

    public function getLeaveType(){
        return $this->belongsTo(LeaveType::class,'leaveType');
    }
}
