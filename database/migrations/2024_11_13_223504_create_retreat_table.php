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
        Schema::create('retreat', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->longText('description');
            $table->float('price', 8, 2);
            $table->integer('number_places');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retreat');
    }
};
