<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Banner extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'banner_title',
        'banner_desc',
        'banner_bg',
        
    ];
    public $translatable = ['banner_title','banner_desc'];
}
