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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('email')->unique();
            $table->string('mobile_no')->unique();
            $table->string('added_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('password');
            $table->string('photo')->default('thrs.jpg');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_owner')->default(0); //0 not owner 1 owner
            $table->integer('company_id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
