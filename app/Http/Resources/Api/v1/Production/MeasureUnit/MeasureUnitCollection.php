<?php

namespace App\Http\Resources\Api\v1\Production\MeasureUnit;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MeasureUnitCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'MeasureUnits' => MeasureUnitResource::collection($this->collection),
        ];
    }
}
