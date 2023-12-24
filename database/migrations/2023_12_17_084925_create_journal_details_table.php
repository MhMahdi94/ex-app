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
        Schema::create('journal_details', function (Blueprint $table) {
            $table->id();
            $table->integer('journal_account_no');
            $table->double('journal_debit');
            $table->double('journal_credit');
            $table->string('journal_description');
            $table->integer('currency');
            $table->unsignedBigInteger('journal_no');
            $table->foreign('journal_no')
                ->references('id')
                ->on('journal_headers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journal_details');
    }
};
