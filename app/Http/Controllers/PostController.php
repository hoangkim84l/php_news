<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        $posts = Post::query()->where('hide', false)->paginate();
        if ($request->ajax()) {
            // Trả về dữ liệu dạng JSON khi là yêu cầu AJAX
            return response()->json([
                'html' => view('partials.thread_item', compact('posts'))->render(),
                'next_page_url' => $posts->nextPageUrl(),
            ], 200, [], JSON_UNESCAPED_UNICODE);
        }
        return view('layouts.posts.list', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->where('hide', false)->first();
        if (!$post) {
            return;
        }
        session()->push('recently_viewed', $post->id);
        $postTags = $post->catalogs;
        $catalog = Catalog::find($post->catalogs()?->first()?->id);
        $postsSameTag = $catalog?->load('posts');

        $post->view = $post->view + 1;
        $post->save();
        return view('layouts.posts.detail', compact('post', 'postTags', 'postsSameTag'));
    }

    public function search(Request $request)
    {
        $tag = $request->input('q');
        $posts = Post::where('name', 'like', "%$tag%")->where('hide', false)->get();
        return view('layouts.posts.search', compact('posts', 'tag'));
    }
}
