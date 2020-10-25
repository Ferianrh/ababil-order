<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomPrintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_print', function (Blueprint $table) {
            $table->increments('id_custom');
            $table->integer('id_print')->unsigned();
            $table->integer('id_ukuran')->unsigned();
            $table->integer('id_jahit')->unsigned();
            $table->integer('harga');
            $table->timestamps();
            $table->softDeletes();

            //foreign key
            $table->foreign('id_print')
            ->references('id_print')->on('sisi_print')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('id_ukuran')
            ->references('id_ukuran')->on('ukuran')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('id_jahit')
            ->references('id_jahit')->on('jenis_jahit')
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
        Schema::dropIfExists('custom_print');
    }
}
