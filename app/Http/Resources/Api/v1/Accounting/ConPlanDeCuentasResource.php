<?php

namespace App\Http\Resources\Api\v1\Accounting;

use Illuminate\Http\Resources\Json\JsonResource;

class ConPlanDeCuentasResource extends JsonResource
{
    public static $wrap = null;
  //'provincia' => $this->resource->provincia,
    public function toArray($request)
    {
      return [
          'type' => 'CuentaContable',  
          'idCuentaContable'   => $this->resource->idcuentacontable,
          'descripcion' => $this->resource->descripcion, 
          'idCuentaPadre' => $this->resource->idcuentapadre, 
          'asiento'   => $this->resource->asiento,
          'nivel'   => $this->resource->nivel, 
          'indexacion'   => $this->resource->indexacion,
          'presupuesto'   => $this->resource->presupuesto,
          'cuentaPadre'   => $this->resource->cuentapadre,
      ];
    }
}
