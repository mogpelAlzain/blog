<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'en_title' => $this->en_title,
            'ar_title' => $this->ar_title,
            'en_content' => $this->en_content,
            'ar_content'  => $this->ar_content,
            'thumbnail' => $this->thumbnail,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s')
        ];
    }
}
