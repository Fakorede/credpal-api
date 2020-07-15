<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Admin extends JsonResource
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
            "data" => [
                "type" => "admins",
                "user_id" => $this->id,
                "attributes" => [
                    "name" => $this->name,
                    "surname" => $this->surname
                ],
            ],
            "links" => [
                "self" => url('/admins/' . $this->id),
            ],
        ];
    }
}
