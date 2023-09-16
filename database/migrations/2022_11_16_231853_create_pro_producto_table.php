<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_producto', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            /* Principal */
            $table->id('idproducto');
            $table->string('codigo', 50);
            $table->string('indice_modificacion', 3);
            $table->string('descripcion', 255);
            $table->text('descripcion_adicional');
            $table->string('medida', 255);
            $table->string('codigo_facturacion', 20);
            $table->string('codigo_equivalente1', 20);
            $table->string('codigo_equivalente2', 20);
            $table->string('norma', 50);


            /* Ingenieria */
            $table->string('simetrica', 20);
            $table->integer('idorigen');
            $table->integer('idfamilia');
            $table->integer('idcategoria');
            $table->integer('idtipodecorte');
            $table->double('pieza_largo');
            $table->double('pieza_ancho');
            $table->double('pieza_scrap');
            $table->double('pieza_volumen');
            $table->boolean('pieza_sobremedida');
            $table->double('matpri_pesoespecifico');
            $table->integer('matpri_idunidadmedida');
            $table->boolean('matpri_barra');
            $table->double('matpri_barra_kg');
            $table->integer('idespesor_chapa');
            $table->integer('comercial_idunidadmedida');

            /* Produccion */
            $table->boolean('equipo');
            $table->boolean('repuesto');
            $table->boolean('kit');
            $table->boolean('consumo_interno');
            $table->boolean('segimiento_stock');
            $table->boolean('orden_produccion');
            $table->boolean('excluye_equipos');
            $table->boolean('impresión_par');
            $table->double('lote_minimo');
            $table->double('multiplo');

            /* Stock */
            $table->double('minimo_manufactura');
            $table->double('maximo_manufactura');
            $table->double('minimo_ventas');
            $table->double('maximo_ventas');
            $table->double('tiempo_abastecimiento');
            $table->boolean('kan_ban');

            /* Compras - Costos */
            $table->boolean('procedencia');
            $table->double('costo_moneda_extranjera');
            $table->double('gastos_importacion');
            $table->double('costo');
            $table->integer('idmoneda');
            $table->boolean('nacionalidad');
            $table->boolean('tipo_actualizacion');
            $table->boolean('excluye_costos');
            $table->string('sinonimo_proveedor', 50);

            /* Contabilidad */
            $table->integer('idimputacion_compras');
            $table->integer('idimputacion_ventas');
            $table->integer('idclasificacion');

            $table->integer('user_id');
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
        Schema::dropIfExists('pro_producto');
    }
}
