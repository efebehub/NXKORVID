<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('gen_sector', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('idsector');
            $table->string('descripcion');
            $table->string('codigo_nx')->nullable();
            $table->bigInteger('idnave')->unsigned();

            $table->foreign('idnave')->references('idnave')->on('gen_nave');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gen_sector');
    }
}
