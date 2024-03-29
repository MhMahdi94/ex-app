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
        Schema::create('pos_request_contents', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->integer('company_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_request_contents');
    }
};
