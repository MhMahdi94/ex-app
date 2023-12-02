<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allowence extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'allName',
        'allval',
        
    ];
    public function employee(){
        return $this->belongsTo(Employees::class);
    }
}
