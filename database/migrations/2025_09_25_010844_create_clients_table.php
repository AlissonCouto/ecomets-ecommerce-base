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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->nullable()->unique();
            $table->enum('type', ['physicalPerson', 'legalPerson']);
            $table->string('cpf', 255)->nullable()->unique();
            $table->string('cnpj', 25)->nullable()->unique();
            $table->string('gender', 100)->nullable();
            $table->string('stateRegistration', 100)->nullable();
            $table->string('socialReason', 100)->nullable();
            $table->string('fantasyName', 100)->nullable();
            $table->date('birth')->nullable();
            $table->string('email', 200)->nullable()->unique();
            $table->string('phone', 200)->nullable();
            $table->boolean('emailNotification')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('zipcode')->nullable();
            $table->unsignedBigInteger('cityId')->nullable();
            $table->string('state', 4)->nullable();
            $table->string('complement')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->rememberToken();
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('cityId')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
