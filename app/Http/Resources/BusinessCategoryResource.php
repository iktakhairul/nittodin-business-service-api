<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class BusinessCategoryResource extends Resource
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
            'id'                     => $this->id,
            'name'                   => $this->name,
            'slug'                   => $this->slug,
            'business_category_code' => $this->business_category_code,
            'icon'                   => $this->icon,
            'description'            => $this->description,
            'serial_no'              => $this->serial_no,
            'status'                 => $this->status,
            'created_at'             => $this->created_at,
            'updated_at'             => $this->updated_at,

        ];
    }
}
