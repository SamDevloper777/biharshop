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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price',10,2);
            $table->decimal('discount_price',10,2)->nullable();
            $table->foreignId('category_id')->constrained()->onDelete("cascade");
            $table->text("description");
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('sold_quantity')->default(0);
            $table->string("brand");
            $table->string("sku")->nullable();
            $table->string("featured_image");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
