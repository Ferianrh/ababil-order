<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->increments('id_detail');
            $table->unsignedInteger('id_pelanggan');
            $table->unsignedInteger('id_pesanan');
            $table->unsignedInteger('id_ukuran')->nullable();
            // $table->unsignedInteger('id_print');
            // $table->unsignedInteger('id_jahit');
            $table->integer('id_custom')->nullable()->unsigned();
            $table->integer('jumlah')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            //foreign key

            $table->foreign('id_pelanggan')
            ->references('id_pelanggan')->on('pelanggan')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('id_pesanan')
            ->references('id_pesanan')->on('pesanan')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('id_custom')
            ->references('id_custom')->on('custom_print')
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
        Schema::dropIfExists('detail_pesanan');
    }
}
