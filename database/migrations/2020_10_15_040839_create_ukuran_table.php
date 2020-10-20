<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUkuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukuran', function (Blueprint $table) {
            $table->increments('id_ukuran');
            $table->integer('id_jahit')->unsigned();
            $table->string('singkatan_ukuran',7);
            $table->string('nama_ukuran',100);
            $table->string('detil_ukuran',100);
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('ukuran');
    }
}
