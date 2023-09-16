<?php

namespace App\Http\Resources\Api\v1\Production\Origin;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OriginCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'Origins' => OriginResource::collection($this->collection),
        ];
    }
}
