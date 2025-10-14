<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    public function creating(Post $post)
    {
        if (isset($post->name)) {
            $post->slug = Str::slug($post->name);
        }
    }

    public function updating(Post $post)
    {
        if (isset($post->name) && $post->isDirty('name')) {
            $post->slug = Str::slug($post->name);
        }
    }
}
