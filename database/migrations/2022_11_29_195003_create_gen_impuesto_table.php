<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenImpuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gen_impuesto', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->id('idimpuesto');
            $table->string('descripcion');
            $table->double('porcentaje');
            $table->integer('compras');
            $table->integer('ventas');
            $table->string('codigowsfe')->nullable();
            $table->bigInteger('idcuentacontabled')->unsigned()->nullable();
            $table->bigInteger('idcuentacontableh')->unsigned()->nullable();
            $table->string('codigo_nx')->nullable();

            $table->foreign('idcuentacontabled')->references('idcuentacontable')->on('con_plandecuentas');
            $table->foreign('idcuentacontableh')->references('idcuentacontable')->on('con_plandecuentas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gen_impuesto');
    }
}
