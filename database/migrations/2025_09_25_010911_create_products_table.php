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
            $table->string('code', 255)->unique();
            $table->string('name', 255)->unique();
            $table->string('slug', 255)->nullable()->unique();
            $table->longText('description')->nullable();
            $table->decimal('value', 9, 2)->default(0);
            $table->decimal('promotionalValue', 9, 2)->nullable()->default(0);
            $table->decimal('weight', 9, 2)->nullable()->default(0);
            $table->decimal('height', 9, 2)->nullable()->default(0);
            $table->decimal('width', 9, 2)->nullable()->default(0);
            $table->decimal('length', 9, 2)->nullable()->default(0);
            $table->unsignedBigInteger('brandId')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('highlight')->boolean(false);
            $table->boolean('launch')->boolean(false);
            $table->timestamps();

            $table->foreign('brandId')->references('id')->on('brands');

            $table->softDeletes();
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
