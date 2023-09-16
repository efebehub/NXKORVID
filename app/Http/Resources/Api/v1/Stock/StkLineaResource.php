<?php

namespace App\Http\Resources\Api\v1\Stock;

use Illuminate\Http\Resources\Json\JsonResource;

class StkLineaResource extends JsonResource
{
    public static $wrap = null;
  //'provincia' => $this->resource->provincia,
    public function toArray($request)
    {
      return [
          'type' => 'Linea',  
          'idLinea'   => $this->resource->idLinea,
          'descripcion' => $this->resource->descripcion,
      ];
    }
}
