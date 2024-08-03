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
        Schema::create('sarana', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perumahan_id')->constrained('perumahan')->onDelete('cascade');
            $table->string('peribadahan');
            $table->string('rekreasi_dan_olahraga');
            $table->string('pertamanan_dan_rth');
            $table->string('perniagaan');
            $table->string('fasilitas_sosial');
            $table->string('pendidikan');
            $table->string('kesehatan');
            $table->string('pemakaman');
            $table->string('parkir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarana');
    }
};
