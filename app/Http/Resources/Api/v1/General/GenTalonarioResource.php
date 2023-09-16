<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\JsonResource;

class GenTalonarioResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
      return [
          'type' => 'Talonario',
          'idTalonario'   => $this->resource->idtalonario,
          'talonario' => $this->resource->descripcion,
          'numero1' => $this->resource->numero1,
          'numero2' => $this->resource->numero2,
          'letra' => $this->resource->letra
      ];
    }
}
