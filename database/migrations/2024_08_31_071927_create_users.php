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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->double('latitude', 18, 15)->nullable();
            $table->double('longitude', 18, 15)->nullable();
            $table->string('description')->nullable();
            //$table->unsignedBigInteger('user_type_id')->nullable();
            //$table->foreignId('canton_id');
            //$table->foreignId('district_id');
            //$table->string('location');
            $table->timestamps();

            // Indexes
            //$table->index('user_type_id');

            // Foreign keys
            //$table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('set null');
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
