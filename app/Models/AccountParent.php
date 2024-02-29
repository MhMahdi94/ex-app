<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AccountParent extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable=[
        'account_no' ,
        'account_name',
        'account_report',
    ];
    public $translatable = ['account_name'];
}
