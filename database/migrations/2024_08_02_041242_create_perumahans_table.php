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
        Schema::create('perumahans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perumahan');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('nama_developer');
            $table->decimal('luas_lahan_perumahan', 8, 2);
            $table->decimal('luas_lahan_efektif', 8, 2);
            $table->decimal('luas_lahan_non_efektif', 8, 2);
            $table->integer('jumlah_unit_rumah_rencana');
            $table->string('status_serah_terima_psu');
            $table->string('url_maps')->nullable();
            $table->string('foto_dokumentasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perumahans');
    }
};
