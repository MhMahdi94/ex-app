<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class COALEVELTWO extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'code',
        'parent_id'
    ];
}
