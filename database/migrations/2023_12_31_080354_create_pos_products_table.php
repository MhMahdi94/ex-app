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
        Schema::create('pos_products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('company_id');
            $table->string('name');
            $table->string('desc');
            $table->string('image');
            $table->string('purchase_price');
            $table->string('sale_price');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_products');
    }
};
