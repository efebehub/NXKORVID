<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStkListapreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stk_listaprecios', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->id('idlistaprecios');
            $table->string('descripcion');
            $table->string('moneda')->nullable();
            $table->integer('sel')->nullable();
            $table->string('codigo_nx')->nullable();

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stk_listaprecios');
    }
}
