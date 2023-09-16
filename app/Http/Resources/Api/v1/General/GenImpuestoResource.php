<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\JsonResource;

class GenImpuestoResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
      return [
          'type' => 'Impuesto',
          'idImpuesto'   => $this->resource->idimpuesto,
          'impuesto' => $this->resource->descripcion,
          'porcentaje' => $this->resource->porcentaje,
          'compras' => $this->resource->compras,
          'ventas' => $this->resource->ventas,
          'codigowsfe' => $this->resource->codigowsfe
      ];
    }
}
