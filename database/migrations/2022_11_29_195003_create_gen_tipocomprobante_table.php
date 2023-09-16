<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenTipocomprobanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gen_tipocomprobante', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->id('idtipocomprobante');
            $table->string('descripcion');
            $table->string('modulo');
            $table->integer('fondos');
            $table->integer('ctacte');
            $table->integer('stock');
            $table->integer('asiento');
            $table->integer('iva');
            $table->string('tipocomprobante');
            $table->bigInteger('idtalonario')->unsigned();
            $table->string('codigowsfe')->nullable();
            $table->bigInteger('idcuentacontabled')->unsigned()->nullable();
            $table->bigInteger('idcuentacontableh')->unsigned()->nullable();
            $table->string('codigo_nx')->nullable();

            $table->foreign('idcuentacontabled')->references('idcuentacontable')->on('con_plandecuentas');
            $table->foreign('idcuentacontableh')->references('idcuentacontable')->on('con_plandecuentas');
            $table->foreign('idtalonario')->references('idtalonario')->on('gen_talonario');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gen_tipocomprobante');
    }
}
