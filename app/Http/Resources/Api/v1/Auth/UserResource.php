<?php

namespace App\Http\Resources\Api\v1\Auth;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class UserResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
        $image = $this->resource->image;
        if(null != $this->resource->image){
            $image .= '?rnd=' . Str::random(5);
        }

        return
        [
            'type' => 'User',
            'id'   => (string) $this->resource->getRouteKey(),
            'uuid'   => $this->resource->uuid,
            'name' => $this->resource->name,
            'surname' => $this->resource->surname,
            'email' => $this->resource->email,
            'image' => $image,
            'role' => RoleResource::make($this->resource->role),
        ];
    }
}
