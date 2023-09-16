<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\JsonResource;

class GenMarcaResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
      return [
          'type' => 'Marca',
          'idMarca'   => $this->resource->idmarca,
          'marca' => $this->resource->descripcion,
      ];
    }
}
