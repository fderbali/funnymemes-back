<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "url" => $this->url,
            "created_at" => $this->created_at,
            "user" => [
                "id" => $this->user->id,
                "name" => $this->user->name,
                "created_at" => $this->user->created_at
            ],
            "likes" => $this->likes->count(),
            "comments" => CommentResource::collection($this->comments)
        ];
    }
}
