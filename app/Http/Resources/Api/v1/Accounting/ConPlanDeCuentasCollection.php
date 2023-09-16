<?php

namespace App\Http\Resources\Api\v1\Accounting;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ConPlanDeCuentasCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'CuentasContables' => ConPlanDeCuentasResource::collection($this->collection),
        ];
    }
}
