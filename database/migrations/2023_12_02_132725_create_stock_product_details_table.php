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
        Schema::create('stock_product_details', function (Blueprint $table) {
            $table->id();
            $table->integer('stock_product_id');
            $table->integer('quantity');
            $table->integer('employee_id');
            $table->integer('operation_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_product_details');
    }
};
