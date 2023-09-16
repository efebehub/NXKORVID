<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\JsonResource;

class GenPaisResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
      return [
          'type' => 'Pais',
          'idPais'   => $this->resource->idpais,
          'pais' => $this->resource->descripcion,
      ];
    }
}
