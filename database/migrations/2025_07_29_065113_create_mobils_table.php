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
        $table->string('nama');
        $table->year('tahun');
        $table->string('warna');
        $table->integer('harga');
        $table->unsignedBigInteger('merek_id');
        $table->foreignId('merek_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
