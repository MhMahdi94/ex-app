<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    use HasFactory;
    protected $fillable=[
        'operation_id',
        'product_id',
        'quantity',
        'date',
        'user_id',
        'price'
    ];

    public function operation(){
        return $this->belongsTo(StockOperation::class);
    }
    public function product(){
        return $this->belongsTo(StockProduct::class);
    }

    public function user(){
        return $this->belongsTo(Employees::class);
    }
}
