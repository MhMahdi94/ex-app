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
        Schema::create('financial_calendar_periods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('financial_calendar_id');
            $table->foreign('financial_calendar_id')->references('id')->on('financial_calendars')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('no_of_days');
            $table->string('year_month');
            $table->integer('finanacial_year');
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyInteger('is_open')->default(0);
            $table->integer('company_id');
            $table->integer('added_by');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_calendar_periods');
    }
};
