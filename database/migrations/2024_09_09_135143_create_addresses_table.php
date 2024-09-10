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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->foreignId('user_id')->constrained(); 
            $table->string('contact');
            $table->string('street');
            $table->string('area');
            $table->string('city');
            $table->string('landmark');
            $table->string('state');
            $table->string('pincode');
            $table->enum('type',["office","home"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
