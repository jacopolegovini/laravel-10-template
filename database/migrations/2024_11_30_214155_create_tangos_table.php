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
        Schema::create('tango', function (Blueprint $table) {
            $table->id();
            $table->integer('initial_position_icon')->nullable();
            $table->double('initial_position_symbol', 4, 2)->nullable();
            $table->integer('final_position_icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tango');
    }
};
