<?php

namespace App\Http\Resources\Api\v1\Production\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
      return [
          'type' => 'Category',
          'idcategoria'   => $this->resource->idcategoria,
          'descripcion' => $this->resource->descripcion,
          'codigo-nx' => $this->resource->codigo_nx,
          'created-at' => $this->resource->created_at->format('Y-m-d H:i:s'),
          'updated-at' => $this->resource->updated_at->format('Y-m-d H:i:s'),
      ];
    }
}
