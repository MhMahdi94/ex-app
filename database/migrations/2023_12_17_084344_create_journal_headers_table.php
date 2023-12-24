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
        Schema::create('journal_headers', function (Blueprint $table) {
            $table->id();
            $table->dateTime('journal_date');
            $table->string('journal_description');
            $table->integer('journal_type');
            $table->integer('journal_report');
            $table->double('total_debit');
            $table->double('total_credit');
            $table->double('balance');
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
        Schema::dropIfExists('journal_headers');
    }
};
