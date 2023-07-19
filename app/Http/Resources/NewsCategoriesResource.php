<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsCategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lang' => $this->lang,
            'order' => $this->order,
            'isVisible' => $this->isVisible,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'news' => new NewsResource($this->whenLoaded('news')),
            'comments' => CommentsResource::collection($this->whenLoaded('comments'))
        ];
    }
}
