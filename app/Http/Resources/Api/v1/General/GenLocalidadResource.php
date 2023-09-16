<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\JsonResource;

class GenLocalidadResource extends JsonResource
{
    public static $wrap = null;
  //'provincia' => $this->resource->provincia,
    public function toArray($request)
    {
      return [
          'type' => 'Localidad',  
          'idLocalidad'   => $this->resource->idlocalidad,
          'localidad' => $this->resource->descripcion, 
          'cp' => $this->resource->cp, 
          'idProvincia'   => $this->resource->idprovincia,
          'provincia'   => $this->resource->provincia->descripcion, 
          'idPais'   => $this->resource->provincia->idpais,
          'pais'   => $this->resource->provincia->pais->descripcion,
      ];
    }
}
