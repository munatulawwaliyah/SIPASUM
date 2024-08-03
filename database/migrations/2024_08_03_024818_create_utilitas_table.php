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
        Schema::create('utilitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perumahan_id')->constrained('perumahan')->onDelete('cascade');
            $table->string('jaringan_penerangan');
            $table->string('jaringan_air_bersih');
            $table->boolean('jaringan_listrik');
            $table->boolean('jaringan_telpon');
            $table->boolean('jaringan_pemadam_kebakaran');
            $table->boolean('gas');
            $table->boolean('transportasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilitas');
    }
};
