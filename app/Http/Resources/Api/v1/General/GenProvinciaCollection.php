<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GenProvinciaCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'Provincias' => GenProvinciaResource::collection($this->collection),
        ];
    }
}
