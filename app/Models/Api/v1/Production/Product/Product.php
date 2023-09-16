<?php

namespace App\Models\Api\v1\Production\Product;

use App\Models\Api\v1\Production\Category\Category;
use App\Models\Api\v1\Production\Family\Family;
use App\Models\Api\v1\Production\TypeCut\TypeCut;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'pro_producto';
    protected $primaryKey = 'idproducto';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'idtipocorte' => 'integer',
        'idorigen' => 'integer',
        'idfamilia' => 'integer',
        'idcategoria' => 'integer',
        'idtipodecorte' => 'integer',
        'pieza_largo'  => 'double',
        'pieza_ancho'  => 'double',
        'pieza_scrap'  => 'double',
        'pieza_volumen' => 'double',
        'pieza_sobremedida' => 'integer',
        'matpri_pesoespecifico' => 'double',
        'matpri_unidadmedida' => 'integer',
        'matpri_barra' => 'integer',
        'matpri_barra_kg' => 'double',
        'comercial_unidadmedida' => 'integer',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idproducto',
        'codigo',
        'indice_modificacion',
        'descripcion',
        'descripcion_adicional',
        'medida',
        'codigo_facturacion',
        'codigo_equivalente1',
        'codigo_equivalente2',
        'norma',
        'simetrica',
        'idorigen',
        'idfamilia',
        'idcategoria',
        'idtipodecorte',
        'pieza_largo',
        'pieza_ancho',
        'pieza_scrap',
        'pieza_volumen',
        'pieza_sobremedida',
        'matpri_pesoespecifico',
        'matpri_idunidadmedida',
        'matpri_barra',
        'matpri_barra_kg',
        'comercial_unidadmedida',
        'idespesor_chapa',
        'comercial_idunidadmedida',
        'equipo',
        'repuesto',
        'kit',
        'consumo_interno',
        'segimiento_stock',
        'orden_produccion',
        'excluye_equipos',
        'impresión_par',
        'lote_minimo',
        'multiplo',
        'minimo_manufactura',
        'maximo_manufactura',
        'minimo_ventas',
        'maximo_ventas',
        'tiempo_abastecimiento',
        'kan_ban',
        'procedencia',
        'costo_moneda_extranjera',
        'gastos_importacion',
        'costo',
        'idmoneda',
        'nacionalidad',
        'tipo_actualizacion',
        'excluye_costos',
        'sinonimo_proveedor',
        'idimputacion_compras',
        'idimputacion_ventas',
        'idclasificacion',
        'user_id',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'idcategoria', 'idcategoria');
    }

    public function family()
    {
        return $this->hasOne(Family::class, 'idfamilia', 'idfamilia');
    }

    public function type_cut()
    {
        return $this->hasOne(TypeCut::class, 'idtipocorte', 'idtipodecorte');
    }

}
