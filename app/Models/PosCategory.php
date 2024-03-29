<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PosCategory extends Model
{
    use HasFactory;
    protected $fillable=['name','company_id'];

    public function products(): HasMany
    {
        return $this->hasMany(PosProduct::class,'category_id');
    }
}
