<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->string('tipe')->after('nama_mobil'); // ✅ Ubah dari 'nama_mobil' ke 'nama'
        });
    }

    public function down()
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->dropColumn('tipe');
        });
    }
};
