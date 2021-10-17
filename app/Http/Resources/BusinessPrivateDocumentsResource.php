<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class BusinessPrivateDocumentsResource extends Resource
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
            'id'                         => $this->id,
            'business_id'                => $this->business_id,
            'document_title'             => $this->document_title,
            'document_identification_no' => $this->document_identification_no,
            'document_images'            => $this->document_images,
            'privacy'                    => $this->privacy,
            'created_at'                 => $this->created_at,
            'updated_at'                 => $this->updated_at,
        ];
    }
}
