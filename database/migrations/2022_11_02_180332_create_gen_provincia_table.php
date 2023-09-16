<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenProvinciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('gen_provincia', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('idprovincia');
            $table->string('descripcion');
            $table->string('codigo')->nullable();
            $table->string('codigo_nx')->nullable();
            $table->bigInteger('idpais')->unsigned();

            $table->foreign('idpais')->references('idpais')->on('gen_pais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gen_provincia');
    }
}
