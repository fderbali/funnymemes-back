<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            "comment" => $this->body,
            "id" => $this->id,
            "meme_url" => $this->meme->url,
            "user_name" => $this->user->name,
            "user_id" => $this->user->id,
            "created_at" => $this->created_at
        ];
    }
}
