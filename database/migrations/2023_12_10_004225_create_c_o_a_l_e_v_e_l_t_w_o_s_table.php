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
        Schema::create('c_o_a_l_e_v_e_l_t_w_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('desc')->nullable();
            $table->integer('parent_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_o_a_l_e_v_e_l_t_w_o_s');
    }
};
