<?php

namespace App\Http\Resources\Api\v1\Production\Family;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FamilyCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'Families' => FamilyResource::collection($this->collection),
        ];
    }
}
