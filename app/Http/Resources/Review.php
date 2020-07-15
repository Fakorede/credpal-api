<?php

namespace App\Http\Resources;

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Review extends JsonResource
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
                "type" => "reviews",
                "review_id" => $this->id,
                "attributes" => [
                    "review" => $this->review,
                    "comment" => $this->comment,
                    "user" => new UserResource($this->user),
                ],
            ],
        ];
    }
}
