<?php

namespace App\Http\Resources\Api\v1\Stock;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StkListaPreciosCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'ListaDePrecios' => StkListaPreciosResource::collection($this->collection),
        ];
    }
}
