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
        Schema::create('perumahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perumahan');
            $table->string('nama_developer');
            $table->decimal('luas_lahan_perumahan');
            $table->decimal('luas_lahan_efektif');
            $table->decimal('luas_lahan_non_efektif');
            $table->integer('jumlah_unit');
            $table->string('status_serah_terima_psu');
            $table->string('maps');
            $table->string('foto');
            $table->foreignId('desa_id')->constrained('desa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perumahan');
    }
};
