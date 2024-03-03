<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable=[
        'client_id',
        'service_id',
        'price',
        'company_id'
    ];

    public function client(){
        return $this->belongsTo(PosClient::class);
    }

    public function service(){
        return $this->belongsTo(PosService::class);
    }
}
