<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GenImpuestoCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'impuestos' => GenImpuestoResource::collection($this->collection),
        ];
    }
}
