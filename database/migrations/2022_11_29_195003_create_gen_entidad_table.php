<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenEntidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gen_entidad', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->id('identidad');
            $table->string('nombre');
            $table->string('domicilio')->nullable();
            $table->string('telefono')->nullable();
            $table->string('fax')->nullable();
            $table->string('mail')->nullable();
            $table->string('cuit')->nullable();
            $table->string('iibb')->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->string('cbu')->nullable();
            $table->integer('escliente');
            $table->integer('esproveedor');
            $table->integer('esentfin');
            $table->integer('esagencia');
            $table->integer('esvendedor');
            $table->integer('esconcesionario');
            $table->integer('estransporte');
            $table->integer('esempleado');
            $table->bigInteger('idtipoiva')->unsigned()->nullable();
            $table->bigInteger('idlistaprecios')->unsigned()->nullable();
            $table->bigInteger('idvendedor')->unsigned()->nullable();
            $table->bigInteger('idlocalidad')->unsigned()->nullable();
            $table->bigInteger('idcuentacontable')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('idtipoiva')->references('idtipoiva')->on('gen_tipoiva');
            $table->foreign('idlistaprecios')->references('idlistaprecios')->on('stk_listaprecios');
            $table->foreign('idvendedor')->references('identidad')->on('gen_entidad');
            $table->foreign('idlocalidad')->references('idlocalidad')->on('gen_localidad');
            $table->foreign('idcuentacontable')->references('idcuentacontable')->on('con_plandecuentas');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gen_entidad');
    }
}
