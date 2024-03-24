<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosRequestContent extends Model
{
    use HasFactory;

    protected $fillable=['product_id','quantity','request_id','company_id'];

    public function request(){
        return $this->belongsTo(PosRequest::class, 'request_id');
    }

    public function product(){
        return $this->belongsTo(PosProduct::class, 'product_id');
    }
}
