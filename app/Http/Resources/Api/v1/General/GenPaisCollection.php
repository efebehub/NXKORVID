<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GenPaisCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'Paises' => GenPaisResource::collection($this->collection),
        ];
    }
}
