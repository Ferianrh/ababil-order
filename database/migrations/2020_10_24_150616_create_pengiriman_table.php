<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->increments('id_pengiriman');
            $table->integer('id_pesanan')->unsigned();
            $table->integer('id_provinsi')->nullable()->unsigned();
            $table->integer('id_kota')->nullable()->unsigned();
            $table->integer('id_kurir')->nullable()->unsigned();
            $table->string('nama_penerima',100);
            $table->string('no_hp',15);
            $table->integer('kode_pos')->unsigned();
            $table->string('alamat_pengiriman',200);
            $table->string('jenis_pengiriman',50);
            $table->integer('biaya_pengiriman')->unsigned();
            $table->string('no_resi',30)->nullable();
            $table->timestamps();
            $table->softDeletes();

            //foreign key
            $table->foreign('id_provinsi')
            ->references('id_provinsi')->on('provinsi')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            //foreign key
            $table->foreign('id_kota')
            ->references('id_kota')->on('kota')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('id_kurir')
            ->references('id_kurir')->on('kurir')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengiriman');
    }
}
