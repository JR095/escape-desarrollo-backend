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
        Schema::create('post_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('daily_post_id');
            $table->string('file_path'); 
            $table->string('file_type'); 
            $table->timestamps();

            // Index
            $table->index('daily_post_id');

            // Foreign Key
            $table->foreign('daily_post_id')->references('id')->on('daily_posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_files');
    }
};
