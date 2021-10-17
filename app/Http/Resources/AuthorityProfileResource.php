<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class AuthorityProfileResource extends Resource
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
            'id'                    => $this->id,
            'business_authority_id' => $this->business_authority_id,
            'father_name'           => $this->father_name,
            'mother_name'           => $this->mother_name,
            'gender'                => $this->gender,
            'dob'                   => $this->dob,
            'religion'              => $this->religion,
            'nationality'           => $this->nationality,
            'permanent_division_id' => $this->permanent_division_id,
            'permanent_district_id' => $this->permanent_district_id,
            'permanent_thana_id'    => $this->permanent_thana_id,
            'permanent_address'     => $this->permanent_address,
            'photo'                 => $this->photo,
            'created_at'            => $this->created_at,
            'updated_at'            => $this->updated_at,
        ];
    }
}
