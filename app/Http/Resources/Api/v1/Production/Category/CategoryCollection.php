<?php

namespace App\Http\Resources\Api\v1\Production\Category;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'Categories' => CategoryResource::collection($this->collection),
        ];
    }
}
