<?php

namespace App\Http\Resources\Api\v1\Production\Product;

use App\Http\Resources\Api\Production\TypeCut\TypeCutResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Production\Category\CategoryResource;
use App\Http\Resources\Api\Production\Family\FamilyResource;

class ProductResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
      return [
            'type' => 'Product',
            'idproducto'   => $this->resource->idproducto,
            'codigo' => $this->resource->codigo,
            'indice_modificacion' => $this->resource->indice_modificacion,
            'descripcion' => $this->resource->descripcion,
            'descripcion_adicional' => $this->resource->descripcion_adicional,
            'medida' => $this->resource->medida,
            'simetrica' => $this->resource->simetrica,
            'codigo_facturacion' => $this->resource->codigo_facturacion,
            'codigo_equivalente1' => $this->resource->codigo_equivalente1,
            'codigo_equivalente2' => $this->resource->codigo_equivalente2,
            'norma' => $this->resource->norma,
            'idorigen' => $this->resource->idorigen,
            'idfamilia' => $this->resource->idfamilia,
            'idcategoria' => $this->resource->idcategoria,
            'idtipodecorte' => $this->resource->idtipodecorte,
            'pieza_largo' => $this->resource->pieza_largo,
            'pieza_ancho' => $this->resource->pieza_ancho,
            'pieza_scrap' => $this->resource->pieza_scrap,
            'pieza_volumen' => $this->resource->pieza_volumen,
            'pieza_sobremedida' => $this->resource->pieza_sobremedida,
            'matpri_pesoespecifico' => $this->resource->matpri_pesoespecifico,
            'matpri_unidadmedida' => $this->resource->matpri_unidadmedida,
            'matpri_barra' => $this->resource->matpri_barra,
            'matpri_barra_kg' => $this->resource->matpri_barra_kg,
            'comercial_unidadmedida' => $this->resource->comercial_unidadmedida,
            'created_at' => $this->resource->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->resource->updated_at->format('Y-m-d H:i:s'),

            'category' => CategoryResource::make($this->resource->category),
            'family'  => FamilyResource::make($this->resource->family),
            'type_cut'  => TypeCutResource::make($this->resource->type_cut),
      ];
    }
}
