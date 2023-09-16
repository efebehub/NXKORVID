<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenTalonarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gen_talonario', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->id('idtalonario');
            $table->string('descripcion');
            $table->integer('numero1');
            $table->integer('numero2');
            $table->string('letra');
            $table->string('codigo_nx')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gen_talonario');
    }
}
