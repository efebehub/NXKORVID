<?php

namespace App\Http\Resources\Api\v1\Production\TypeCut;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TypeCutCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'TypesCut' => TypeCutResource::collection($this->collection),
        ];
    }
}
