<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $trendingPosts = Post::inRandomOrder()->where('hide', false)->get();

        $new3Posts = Post::orderBy('id', 'desc')->where('hide', false)->limit(3)->get();
        $categoriesAsTags = Catalog::orderBy('id', 'desc')->get();

        $populars = Post::orderBy('view', 'desc')->where('hide', false)->limit(14)->get();
        $postHightLight = Catalog::where('slug', 'highlight')->first();
        $highlight = $postHightLight->load('posts');
        $phoBienMoiPost = Post::orderBy('id', 'desc')->where('hide', false)->limit(10)->get();
        return view('layouts.home.home', compact('trendingPosts', 'phoBienMoiPost', 'new3Posts', 'categoriesAsTags', 'populars', 'highlight'));
    }
}
