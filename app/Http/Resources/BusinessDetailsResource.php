<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class BusinessDetailsResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'business_id'  => $this->business_id,
            'description'  => $this->description,
            'cover_images' => $this->cover_images,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
        ];
    }
}
