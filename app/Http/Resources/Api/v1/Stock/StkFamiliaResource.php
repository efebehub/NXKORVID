<?php

namespace App\Http\Resources\Api\v1\Stock;

use Illuminate\Http\Resources\Json\JsonResource;

class StkFamiliaResource extends JsonResource
{
    public static $wrap = null;
  //'provincia' => $this->resource->provincia,
    public function toArray($request)
    {
      return [
          'type' => 'Familia',  
          'idfamilia'   => $this->resource->idFamilia,
          'descripcion' => $this->resource->descripcion,
          'idLinea'   => $this->resource->idLinea,
          'familia' => $this->resource->linea
      ];
    }
}
