<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gambar');
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->unsignedInteger('kategori_id');           
            $table->string('tahun');
            $table->string('isbn');
            $table->unsignedInteger('kota_id');           
            $table->string('harga');
            $table->text('deskripsi');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
