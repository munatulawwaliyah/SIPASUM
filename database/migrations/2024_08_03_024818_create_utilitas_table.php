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
            $table->foreignId('perumahans_id')->constrained('perumahans')->onDelete('cascade');
            $table->string('jaringan_penerangan')->nullable();
            $table->string('jaringan_air_bersih')->nullable();
            $table->boolean('jaringan_listrik')->nullable();
            $table->boolean('jaringan_telpon')->nullable();
            $table->boolean('jaringan_pemadam_kebakaran')->nullable();
            $table->boolean('gas')->nullable();
            $table->boolean('transportasi')->nullable();
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
