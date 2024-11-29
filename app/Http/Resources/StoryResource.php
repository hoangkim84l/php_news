<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class StoryResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'site_title' => $this->site_title,
            'meta_desc' => $this->meta_desc,
            'meta_key' => $this->meta_key,
            'image_link' => url("/upload/stories/$this->image_link"),
            'category_id' => $this->category_id,
            'status' => $this->status,
            'continues' => $this->continues,
            'view' => number_format($this->view),
            'author' => $this->author,
            'rate_total' => $this->rate_total,
            'rate_count' => $this->rate_count,
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y'),
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y'),
        ];
    }
}
