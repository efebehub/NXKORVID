<?php

namespace App\Http\Resources\Api\v1\Production\Family;

use Illuminate\Http\Resources\Json\JsonResource;

class FamilyResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
      return [
          'type' => 'Family',
          'idfamilia'   => $this->resource->idfamilia,
          'descripcion' => $this->resource->descripcion,
          'codigo-nx' => $this->resource->codigo_nx,
          'created-at' => $this->resource->created_at->format('Y-m-d H:i:s'),
          'updated-at' => $this->resource->updated_at->format('Y-m-d H:i:s'),
      ];
    }
}
