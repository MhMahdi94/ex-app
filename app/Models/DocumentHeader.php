<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentHeader extends Model
{
    use HasFactory;

    protected $fillable=[
        'document_date', 
        'document_description', 
        'document_type', 
        'document_balance', 
        'document_post',
        'company_id',
        'added_by',
    ];

    public function documentType(){
        return $this->belongsTo(DocumentType::class,'document_type');
    }
}
