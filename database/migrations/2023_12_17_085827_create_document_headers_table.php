<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('document_headers', function (Blueprint $table) {
            $table->id();
            $table->dateTime('document_date');
            $table->string('document_description');
            $table->integer('document_type');
            $table->integer('document_post');
            $table->double('document_balance');
            $table->integer('company_id');
            $table->integer('added_by');
            
            $table->integer('updated_by')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_headers');
    }
};
