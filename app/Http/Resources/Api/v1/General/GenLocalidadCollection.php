<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GenLocalidadCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'Localidades' => GenLocalidadResource::collection($this->collection),
        ];
    }
}
