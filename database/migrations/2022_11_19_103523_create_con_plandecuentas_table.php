<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConPlandecuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('con_plandecuentas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('idcuentacontable')->unsigned();
            $table->primary('idcuentacontable');
            $table->string('descripcion', 50);
            $table->bigInteger('idcuentapadre')->unsigned()->nullable();
            $table->integer('asiento');
            $table->integer('nivel');
            $table->integer('indexacion')->nullable();
            $table->double('presupuesto')->nullable();
            $table->string('codigo_nx', 50)->nullable();
            $table->timestamps();

            $table->foreign('idcuentapadre')->references('idcuentacontable')->on('con_plandecuentas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('con_plandecuentas');
    }
}