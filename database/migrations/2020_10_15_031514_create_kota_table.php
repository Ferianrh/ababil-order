<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kota', function (Blueprint $table) {
            $table->increments('id_kota');
            $table->integer('id_provinsi')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('nama_kota',100);
            $table->timestamps();
            $table->softDeletes();

            //foreign key
            $table->foreign('id_provinsi')
            ->references('id_provinsi')->on('provinsi')
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
        Schema::dropIfExists('kota');
    }
}
