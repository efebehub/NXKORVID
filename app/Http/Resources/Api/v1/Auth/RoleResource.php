<?php

namespace App\Http\Resources\Api\v1\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'type' => 'role',
            'id'   => (string) $this->resource->id,
            'name' => $this->resource->name,
        ];
    }
}
