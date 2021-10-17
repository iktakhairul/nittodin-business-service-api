<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class BusinessAuthorityResource extends Resource
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
            'id'                   => $this->id,
            'user_id'              => $this->user_id,
            'business_id'          => $this->business_id,
            'name'                 => $this->name,
            'contact_numbers'      => $this->contact_numbers,
            'emails'               => $this->emails,
            'ownership_percentage' => $this->ownership_percentage,
            'status'               => $this->status,
            'created_at'           => $this->created_at,
            'updated_at'           => $this->updated_at,

        ];
    }
}
