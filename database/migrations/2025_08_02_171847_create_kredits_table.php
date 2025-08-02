<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKreditsTable extends Migration
{
    public function up()
    {
        Schema::create('kredits', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mobil');
            $table->integer('tenor'); // dalam bulan
            $table->decimal('bunga', 5, 2); // misal 5.25%
            $table->decimal('dp_minimum', 10, 2); // persen
            $table->string('metode_pembayaran');
            $table->string('promo')->nullable(); // boleh kosong
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kredits');
    }
}
