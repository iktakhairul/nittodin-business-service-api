<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class AuthorityProfileDocumentsResource extends Resource
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
            'authority_profile_id' => $this->authority_profile_id,
            'nid'                  => $this->nid,
            'nid_front_image'      => $this->nid_front_image,
            'nid_back_image'       => $this->nid_back_image,
            'tin'                  => $this->tin,
            'tin_image'            => $this->tin_image,
            'passport_no'          => $this->passport_no,
            'created_at'           => $this->created_at,
            'updated_at'           => $this->updated_at,

        ];
    }
}
