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
            $table->string('name');
            $table->string('phone_number');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('email')->unique();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('canton_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('followers_count')->default(0);
            $table->timestamps();
            
            // Indexes
            $table->index('category_id');
            $table->index('canton_id');
            $table->index('district_id');

            // Foreign Keys
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('canton_id')->references('id')->on('cantons')->onDelete('set null');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
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
