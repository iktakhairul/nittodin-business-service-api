<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class BusinessResource extends Resource
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
            'business_category_id' => $this->business_category_id,
            'name'                 => $this->name,
            'slug'                 => $this->slug,
            'type'                 => $this->type,
            'business_logo'        => $this->business_logo,
            'business_code'        => $this->business_code,
            'contact_no'           => $this->contact_no,
            'email'                => $this->email,
            'website'              => $this->website,
            'division_id'          => $this->division_id,
            'district_id'          => $this->district_id,
            'thana_id'             => $this->thana_id,
            'address'              => $this->address,
            'ranking_score'        => $this->ranking_score,
            'status'               => $this->status,
            'created_at'           => $this->created_at,
            'updated_at'           => $this->updated_at,
        ];
    }
}
