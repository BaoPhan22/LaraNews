<?php

namespace App\Http\Resources;

use App\Models\NewsCategories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
            'lang' => $this->lang,
            'title' => $this->title,
            'summary' => $this->summary,
            'image' => $this->image,
            'content' => $this->content,
            'views' => $this->views,
            'isTrending' => $this->isTrending,
            'isVisible' => $this->isVisible,
            'tags' => $this->tags,
            'news_categories' => NewsCategories::find($this->news_categories_id),
            'user' => User::find($this->user_id),
            'comments' => CommentsResource::collection($this->whenLoaded('comment')), 
            'created_at' => $this->created_at
        ];
    }
}
