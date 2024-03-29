<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosRequest extends Model
{
    use HasFactory;

    protected $fillable=['client_id','total_order','company_id'];

    public function client(){
        return $this->belongsTo(PosClient::class, 'client_id');
    }
}
