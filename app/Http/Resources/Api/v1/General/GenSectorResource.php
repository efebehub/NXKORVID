<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\JsonResource;

class GenSectorResource extends JsonResource
{
    public static $wrap = null;
  //'provincia' => $this->resource->provincia,
    public function toArray($request)
    {
      return [
          'type' => 'Sector',  
          'idSector'   => $this->resource->idsector,
          'sector' => $this->resource->descripcion, 
          'idNave'   => $this->resource->idnave,
          'nave'   => $this->resource->nave->descripcion,
      ];
    }
}
