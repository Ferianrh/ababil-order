<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->increments('id_pelanggan');
            $table->integer('id')->nullable()->unsigned();
            $table->integer('id_provinsi')->nullable()->unsigned();
            $table->integer('id_kota')->nullable()->unsigned();
            $table->string('nama_lengkap',100);
            $table->date('tanggal_lahir');
            $table->string('alamat_lengkap',200);
            $table->integer('kode_pos')->unsigned();
            $table->string('no_hp',15);
            $table->string('email',50);
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

            //foreign key
            $table->foreign('id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('pelanggan');
    }
}
