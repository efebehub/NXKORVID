<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\JsonResource;

class GenTipoComprobanteResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
      return [
          'type' => 'TipoComprobante',
          'idTipoComprobante'   => $this->resource->idtipocomprobante,
          'descripcion' => $this->resource->descripcion,
          'modulo' => $this->resource->modulo,
          'fondos' => $this->resource->fondos,
          'ctacte' => $this->resource->ctacte,
          'stock' => $this->resource->stock,
          'asiento' => $this->resource->asiento,
          'iva' => $this->resource->iva,
          'tipoComprobante' => $this->resource->tipocomprobante,
          'idTalonario' => $this->resource->idtalonario,
          'codigoWsfe' => $this->resource->codigowsfe,
          'idCuentacontableD' => $this->resource->idcuentacontabled,
          'idCuentacontableH' => $this->resource->idcuentacontableh,
      ];
    }
}
