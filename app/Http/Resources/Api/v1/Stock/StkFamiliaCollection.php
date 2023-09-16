<?php

namespace App\Http\Resources\Api\v1\Stock;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StkFamiliaCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'Familia' => StkFamiliaResource::collection($this->collection),
        ];
    }
}
