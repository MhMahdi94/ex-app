<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'added_by',
        'updated_by',
        'password',
        'is_owner',
    ];
}
