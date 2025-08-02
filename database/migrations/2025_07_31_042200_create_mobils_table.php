<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('mobils', function (Blueprint $table) {
        $table->id();
        $table->string('nama_mobil');;
        $table->string('foto')->nullable();
        $table->year('tahun');
        $table->string('warna');
        $table->integer('harga');
        $table->unsignedBigInteger('merek_id'); // hanya satu kali
        $table->timestamps();

        // Tambahkan foreign key jika diperlukan
        $table->foreign('merek_id')->references('id')->on('mereks')->onDelete('cascade');
    });
}


    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};


