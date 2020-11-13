<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id_pembayaran');
            $table->integer('id_pesanan')->unsigned();
            $table->integer('total_pembayaran')->unsigned();
            $table->integer('sudah_dibayar')->nullable()->unsigned();
            $table->date('tanggal_pembayaran')->nullable();
            $table->string('bukti_pembayaran',100)->nullable();
            $table->string('status_pembayaran',50);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_pesanan')
            ->references('id_pesanan')->on('pesanan')
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
        Schema::dropIfExists('pembayaran');
    }
}
