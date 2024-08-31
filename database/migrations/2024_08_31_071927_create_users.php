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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('social_login_provider')->nullable();
            $table->string('social_login_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('preference_id')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('location_id');
            $table->index('preference_id');

            // Foreign keys
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null');
            $table->foreign('preference_id')->references('id')->on('preferences')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
