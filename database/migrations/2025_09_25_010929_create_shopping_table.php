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
        Schema::create('shopping', function (Blueprint $table) {
            $table->id();
            $table->string('description', 255)->nullable()->default(null);
            $table->string('status', 255)->default('Não concluída');
            $table->string('code', 255)->nullable()->default(null);
            $table->decimal('subtotal', 9, 2)->default(0);
            $table->decimal('discount', 9, 2)->default(0);
            $table->decimal('total', 9, 2)->default(0);
            $table->integer('installments')->default(1);
            $table->unsignedBigInteger('clientId');
            $table->unsignedBigInteger('couponId')->nullable()->default(null);

            $table->foreign('clientId')->references('id')->on('clients');
            $table->foreign('couponId')->references('id')->on('coupons');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping');
    }
};
