<?php

namespace App\Http\Resources\Api\v1\Production\Origin;

use Illuminate\Http\Resources\Json\JsonResource;

class OriginResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
      return [
          'type' => 'Origin',
          'idorigen'   => $this->resource->idorigen,
          'descripcion' => $this->resource->descripcion,
          'codigo-nx' => $this->resource->codigo_nx,
          'created-at' => $this->resource->created_at->format('Y-m-d H:i:s'),
          'updated-at' => $this->resource->updated_at->format('Y-m-d H:i:s'),
      ];
    }
}
