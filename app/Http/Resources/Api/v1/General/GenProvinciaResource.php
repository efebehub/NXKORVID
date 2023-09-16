<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\JsonResource;

class GenProvinciaResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
      return [
          'type' => 'Provincia',
          'idProvincia'   => $this->resource->idprovincia,
          'provincia' => $this->resource->descripcion,
          'idPais'   => $this->resource->idpais,
          'pais'   => $this->resource->pais->descripcion
      ];
    }
}
