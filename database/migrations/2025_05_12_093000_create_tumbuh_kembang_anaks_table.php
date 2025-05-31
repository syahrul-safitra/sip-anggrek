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
        Schema::create('tumbuh_kembang_anaks', function (Blueprint $table) {
            $table->id();

            $table->string('nik_anak', 16);
            $table->date('tanggal');
            $table->string('berat_badan');
            $table->string('tinggi_badan');
            $table->string('lingkar_kepala');
            $table->string('lingkar_lengan_atas');

            $table->foreign('nik_anak')->references('nik_anak')->on('anaks')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tumbuh_kembang_anaks');
    }
};
