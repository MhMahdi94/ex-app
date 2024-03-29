<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosClient extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'mobile_no',
        'email',
        'address',
        'company_id'
    ];
}
