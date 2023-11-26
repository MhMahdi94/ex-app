<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'owner_id',
        'mobile_no',
        'email',
        'description',
        'noOfDept',
        'noOfEmployee',
        'isActive',
        'subscriptionStart',
        'subscriptionEnd',
        'is_owner',
    ];

    public function owner(){
        return $this->belongsTo(Employees::class);
    }
}
