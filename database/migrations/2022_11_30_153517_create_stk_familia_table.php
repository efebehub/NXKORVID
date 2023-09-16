<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStkFamiliaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stk_familia', function (Blueprint $table) {
            $table->id('idfamilia');
            $table->string('descripcion');
            $table->bigInteger('idlinea')->unsigned();
            $table->string('codigo_nx')->nullable();

            $table->foreign('idlinea')->references('idlinea')->on('stk_linea');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stk_familia');
    }
}
