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
        Schema::create('parentts', function (Blueprint $table) {
            $table->id();

            $table->string('nik_ayah', 16)->unique();
            $table->string('nama_ayah');
            $table->string('no_kk')->unique();
            $table->string('no_telepon')->unique();
            $table->string('password');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parentts');
    }

    
};
