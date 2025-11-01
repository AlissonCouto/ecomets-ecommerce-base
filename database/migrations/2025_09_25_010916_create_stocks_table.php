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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productId')->nullable();
            $table->unsignedBigInteger('colorId')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('highlight')->default(false);
            $table->boolean('main')->boolean(false);
            $table->timestamps();

            $table->foreign('productId')->references('id')->on('products');
            $table->foreign('colorId')->references('id')->on('colors');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
