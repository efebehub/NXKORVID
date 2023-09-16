<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GenMarcaCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'Marcas' => GenMarcaResource::collection($this->collection),
        ];
    }
}
