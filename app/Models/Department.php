<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'employee_id',
        'company_id'
    ];
    public function employee(){
        return $this->belongsTo(Employees::class);
    }

}
