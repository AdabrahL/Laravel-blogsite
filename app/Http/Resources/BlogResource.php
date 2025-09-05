<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'content'    => $this->content,
            'status'     => $this->status ?? 'draft', // fallback if status not set
            'image_url'  => $this->image ? asset('storage/' . $this->image) : null,
            'category'   => [
                'id'   => $this->category->id ?? null,
                'name' => $this->category->name ?? null,
            ],
            'created_at' => $this->created_at->format('M d, Y'),
            'updated_at' => $this->updated_at->format('M d, Y'),
        ];
    }
}
