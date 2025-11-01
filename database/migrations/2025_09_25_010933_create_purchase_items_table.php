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
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->string('product')->default(null)->nullable();
            $table->string('description', 255)->nullable();
            $table->integer('quantity');
            $table->decimal('unitaryValue', 9, 2)->default(0);
            $table->decimal('total', 9, 2)->default(0);
            $table->unsignedBigInteger('shoppingId');
            $table->unsignedBigInteger('stockId');

            $table->foreign('shoppingId')->references('id')->on('shopping');
            $table->foreign('stockId')->references('id')->on('stocks');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};
