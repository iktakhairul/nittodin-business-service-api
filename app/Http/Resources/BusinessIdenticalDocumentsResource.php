<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class BusinessIdenticalDocumentsResource extends Resource
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
            'id'                  => $this->id,
            'business_id'         => $this->business_id,
            'trade_license_no'    => $this->trade_license_no,
            'trade_license_image' => $this->trade_license_image,
            'tin'                 => $this->tin,
            'tin_image'           => $this->tin_image,
            'bin'                 => $this->bin,
            'bin_image'           => $this->bin_image,
            'created_at'          => $this->created_at,
            'updated_at'          => $this->updated_at,
        ];
    }
}
