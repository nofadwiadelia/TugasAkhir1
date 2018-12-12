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
            $table->integer('kategori_id')->unsigned();           
            $table->string('tahun');
            $table->string('isbn');
            $table->integer('kota_id')->unsigned();           
            $table->string('harga');
            $table->text('deskripsi');
            $table->integer('stok');
            $table->integer('user_id')->unsigned();
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
