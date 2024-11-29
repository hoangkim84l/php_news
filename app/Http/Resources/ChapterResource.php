<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ChapterResource extends JsonResource
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
            'site_title' => $this->site_title,
            'meta_desc' => $this->meta_desc,
            'meta_key' => $this->meta_key,
            'story_id' => $this->story_id,
            'image_link' => url("/upload/stories/$this->image_link"),
            'audio_link' => url("/upload/stories/$this->image_link"),
            'show_img' => $this->show_img,
            'content' => $this->content,
            'author' => $this->author,
            'status' => $this->status,
            'ordering' => $this->ordering,
            'view' => number_format($this->view),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y'),
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y'),
            'story' => $this->whenLoaded('story', StoryResource::make($this->story)),
        ];
    }
}
