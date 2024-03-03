<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusniessCompany extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'mobile_no',
        'desc',
        'isActive',
        'business_type',
        'subscriptionStart',
        'subscriptionEnd'
    ];
}
