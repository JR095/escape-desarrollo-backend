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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_place_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('rating');
            $table->timestamps();

            // Index
            $table->index('post_place_id');
            $table->index('user_id');

            // Foreign Key
            $table->foreign('post_place_id')->references('id')->on('post_places')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
