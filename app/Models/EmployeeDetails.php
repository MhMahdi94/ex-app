<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'employee_id',
        'dept_id',
        'salary',
        'jobTitle',
        'jobType'
    ];
}
