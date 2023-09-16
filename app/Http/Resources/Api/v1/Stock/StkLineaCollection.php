<?php

namespace App\Http\Resources\Api\v1\Stock;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StkLineaCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'Linea' => StkLineaResource::collection($this->collection),
        ];
    }
}
