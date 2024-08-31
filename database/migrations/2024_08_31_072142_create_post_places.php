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
        Schema::create('post_places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('description');
            $table->string('image');
            $table->string('address')->nullable();
            $table->decimal('average_rating', 3, 2)->default(0); 
            $table->integer('approximate_price');
            $table->timestamps();

            // Index
            $table->index('company_id');

            // Foreign Key
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_places');
    }
};
