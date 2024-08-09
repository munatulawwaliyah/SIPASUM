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
            $table->string('nama_developer');
            $table->decimal('luas_lahan_perumahan');
            $table->decimal('luas_lahan_efektif');
            $table->decimal('luas_lahan_non_efektif');
            $table->integer('jumlah_unit');
            $table->boolean('status_serah_terima_psu');
            $table->string('maps', 400);
            $table->string('foto');
            $table->foreignId('desas_id')->constrained('desas')->onDelete('cascade');
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
