<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenLocalidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gen_localidad', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('idlocalidad');
            $table->string('descripcion');
            $table->string('cp')->nullable();
            $table->string('codigo_nx')->nullable();
            $table->bigInteger('idprovincia')->unsigned();

            $table->foreign('idprovincia')->references('idprovincia')->on('gen_provincia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gen_localidad');
    }
}
