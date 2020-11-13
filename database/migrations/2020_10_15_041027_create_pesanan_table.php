<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('id_pesanan');
            $table->integer('id_paket')->nullable()->unsigned();
            // $table->integer('id_kurir')->nullable()->unsigned();
            $table->integer('id_kain')->nullable()->unsigned();
            $table->string('jenis_lengan',20)->nullable();
            $table->string('grade_kain',20)->nullable();
            $table->string('keterangan_pesanan',250);

            $table->date('tanggal_pesanan');
            // $table->string('alamat_pengiriman',200);
            $table->string('status_pesanan',30);
            // $table->string('jenis_pengiriman',50);
            $table->string('custom_desain',100);
            $table->timestamps();
            $table->softDeletes();

            //foreign key
            $table->foreign('id_paket')
            ->references('id_paket')->on('katalog')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            // $table->foreign('id_kurir')
            // ->references('id_kurir')->on('kurir')
            // ->onUpdate('cascade')
            // ->onDelete('restrict');

            $table->foreign('id_kain')
            ->references('id_kain')->on('kain')
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
        Schema::dropIfExists('pesanan');
    }
}
