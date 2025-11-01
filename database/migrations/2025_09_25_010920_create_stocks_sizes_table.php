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
        Schema::create('stocks_sizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stockId');
            $table->unsignedBigInteger('sizeId');
            $table->integer('quantity')->nullable();
            $table->timestamps();

            $table->foreign('stockId')->references('id')->on('stocks');
            $table->foreign('sizeId')->references('id')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks_sizes');
    }
};
