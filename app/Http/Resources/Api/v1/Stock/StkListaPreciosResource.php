<?php

namespace App\Http\Resources\Api\v1\Stock;

use Illuminate\Http\Resources\Json\JsonResource;

class StkListaPreciosResource extends JsonResource
{
    public static $wrap = null;
  //'provincia' => $this->resource->provincia,
    public function toArray($request)
    {
      return [
          'type' => 'ListaDePrecios',  
          'idListaPrecios'   => $this->resource->idlistaprecios,
          'descripcion' => $this->resource->descripcion, 
          'moneda' => $this->resource->moneda, 
          'sel'   => $this->resource->sel
      ];
    }
}
