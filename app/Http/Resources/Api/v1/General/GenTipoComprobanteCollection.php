<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GenTipoComprobanteCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'tiposComprobante' => GenTipoComprobanteResource::collection($this->collection),
        ];
    }
}
