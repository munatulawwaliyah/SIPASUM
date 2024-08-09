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
        Schema::create('saranas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perumahans_id')->constrained('perumahans')->onDelete('cascade');
            $table->string('peribadahan')->nullable();
            $table->string('rekreasi_dan_olahraga')->nullable();
            $table->string('pertamanan_dan_rth')->nullable();
            $table->string('perniagaan')->nullable();
            $table->string('fasilitas_sosial')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('kesehatan')->nullable();
            $table->string('pemakaman')->nullable();
            $table->string('parkir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saranas');
    }
};
