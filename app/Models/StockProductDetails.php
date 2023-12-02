<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockProductDetails extends Model
{
    use HasFactory;
    protected $fillable=[
        'stock_product_id',
        'quantity',
        'employee_id',
        'operation_id'
    ];
}
