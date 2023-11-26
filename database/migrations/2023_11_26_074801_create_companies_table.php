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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('owner_id'); //employee id (owner)
            $table->string('email');
            $table->string('description');
            $table->integer('noOfDept');
            $table->integer('noOfEmployee');
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
        Schema::dropIfExists('companies');
    }
};
