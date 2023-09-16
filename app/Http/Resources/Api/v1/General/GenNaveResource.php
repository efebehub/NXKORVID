<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\JsonResource;

class GenNaveResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
      return [
          'type' => 'Nave',
          'idNave'   => $this->resource->idnave,
          'nave' => $this->resource->descripcion,
      ];
    }
}
