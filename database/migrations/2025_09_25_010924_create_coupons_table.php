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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique();
            $table->string('slug', 255)->nullable()->unique();
            $table->string('description', 255)->nullable();
            $table->enum('validityType', ['usageLimit', 'deadline']);
            $table->enum('discountType', ['value', 'percent']);
            $table->decimal('value', 9, 2);
            $table->boolean('active')->default(true);
            $table->integer('usageLimit')->nullable()->default(null);
            $table->integer('aplications')->nullable()->default(0);
            $table->date('expirationDate')->nullable()->default(null);
            $table->time('expiryTime')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
