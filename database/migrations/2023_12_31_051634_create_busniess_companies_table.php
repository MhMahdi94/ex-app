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
        Schema::create('busniess_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile_no');
            $table->string('desc');
            $table->integer('business_type');
            $table->boolean('isActive')->default(false);
            $table->dateTime('subscriptionStart');
            $table->dateTime('subscriptionEnd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('busniess_companies');
    }
};
