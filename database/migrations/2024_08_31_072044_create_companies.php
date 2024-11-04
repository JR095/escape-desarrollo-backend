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
            $table->foreignId('user_type_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('sub_categories_id')->constrained();
            $table->string('email')->unique();
            $table->string('description');
            $table->string('image')->nullable();
            $table->foreignId('canton_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->double('latitude', 18, 15)->nullable();
            $table->double('longitude', 18, 15)->nullable();
            $table->bigInteger('followers_count')->default(0)->nullable();
            $table->string('password');
            $table->string('whatsapp')->nullable();
            $table->bigInteger('following_count')->default(0)->nullable(); 
            $table->rememberToken();
            $table->timestamps();
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
