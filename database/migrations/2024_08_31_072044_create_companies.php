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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->string('phone_number');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('email')->unique();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
            $table->bigInteger('followers_count')->default(0);
        
            // Indexes
            $table->index('user_id');
            $table->index('category_id');
            $table->index('location_id');

            // Foreign Keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
