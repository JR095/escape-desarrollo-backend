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
        Schema::create('user_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('search_histories', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Elimina la clave foránea
        });
        
        Schema::dropIfExists('search_histories'); // Elimina la tabla
        Schema::dropIfExists('users'); // Elimina la tabla
        Schema::dropIfExists('user_types');
    }
};
