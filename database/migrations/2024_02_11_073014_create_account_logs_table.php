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
        Schema::create('account_logs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('account_id');
            $table->integer('account_report');
            $table->float('debit');
            $table->float('credit');
            $table->string('desc');
            $table->integer('operation');
            $table->integer('company_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_logs');
    }
};
