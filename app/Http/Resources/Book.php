<?php

namespace App\Http\Resources;

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
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
                "type" => "books",
                "book_id" => $this->id,
                "attributes" => [
                    "isbn" => $this->isbn,
                    "title" => $this->title,
                    "description" =>$this->description,
                    // "authors" => [
                    //     new AdminResource($this->admin),
                    // ],
                ],
            ],
            "links" => [
                "self" => url('/books/' . $this->id),
            ],
        ];
    }
}
