<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosProduct extends Model
{
    use HasFactory;
    protected $fillable=['name','category_id','purchase_price','sale_price','desc','image', 'quantity','company_id'];

    public function category(){
        return $this->belongsTo(PosCategory::class);
    }
}
