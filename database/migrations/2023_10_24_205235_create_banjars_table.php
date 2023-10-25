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
        Schema::create('banjars', function (Blueprint $table) {
            $table->id();
            $table->foreignID('kabupaten_id');
            $table->foreignID('kecamatan_id');
            $table->foreignID('desa_id');
            $table->string('nama_banjar');
            $table->string('kelihan_banjar');
            $table->string('notelp_kelihan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banjars');
    }
};
