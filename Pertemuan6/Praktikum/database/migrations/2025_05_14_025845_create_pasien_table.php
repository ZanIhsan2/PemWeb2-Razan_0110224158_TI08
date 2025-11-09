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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->string('tmp_lahir');
            $table->string('tgl_lahir');
            $table->enum('gender', ['L', 'P']);
            $table->string('email')->nullable();
            $table->text('alamat');
            $table->unsignedBigInteger('kelurahan_id')->nullable(); // Foreign Key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
