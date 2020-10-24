<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'      => $this->name,
            'email'     => $this->email,
            'mobile'    => $this->mobile,
            'image'     => $this->image,
            'language'  => $this->lang,
            'is_active' => $this->is_active == 1 ? 1 : 0,
        ];
    }
}
