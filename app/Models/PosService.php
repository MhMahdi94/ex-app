<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosService extends Model
{
    use HasFactory;
    protected $fillable=['name','business_id','description',];

    public function business(){
        return $this->belongsTo(BusniessCompany::class);
    }
}
