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
Schema::create('customers', function (Blueprint $table) {
 $table->string('id')->primary();
  $table->string('lastname');
 $table->string('firstname');
 $table->integer('age');
 $table->string('email')->unique();
 $table->longText('message');
$table->foreignId('user_id')->constrained('users');  
 $table->timestamps();
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};