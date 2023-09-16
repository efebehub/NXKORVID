<?php

namespace App\Http\Resources\Api\v1\Production\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'Products' => ProductResource::collection($this->collection),
        ];
    }
}
