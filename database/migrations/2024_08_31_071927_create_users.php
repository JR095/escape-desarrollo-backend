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
            $table->string('password');
            $table->rememberToken();
            $table->double('latitude', 18, 15)->nullable();
            $table->double('longitude', 18, 15)->nullable();
            $table->string('image')->nullable();
            $table->foreignId('user_type_id')->constrained();
            $table->foreignId('canton_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->foreignId('preferences_1_id')->constrained('sub_categories');
            $table->foreignId('preferences_2_id')->constrained('sub_categories');
            $table->foreignId('preferences_3_id')->constrained('sub_categories');
            $table->bigInteger('following_count')->default(0)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
