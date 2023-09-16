<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\JsonResource;

class GenTipoIvaResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
      return [
          'type' => 'TipoIva',
          'idTipoIva'   => $this->resource->idtipoiva,
          'tipoIva' => $this->resource->descripcion,
      ];
    }
}
