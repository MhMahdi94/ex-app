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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('account_no');
            $table->integer('account_parent_id')->default(0);
            $table->string('account_name');
            $table->integer('account_type');
            $table->integer('account_report');
            $table->integer('account_level');
            $table->double('account_debit');
            $table->double('account_credit');
            $table->double('account_balance');
            $table->integer('company_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
