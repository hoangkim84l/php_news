<?php

namespace App\Http\Middleware;

use App\Models\Catalog;
use App\Models\CoreConfig;
use App\Models\Post;
use Closure;

class SetGlobalData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $tags = Catalog::query()->get();
        $siteSetting = CoreConfig::query()->find(1);

        $postIds = session()->get('recently_viewed', []);
        $lastFiveViewedIds = array_slice($postIds, -5);
        $viewedPosts = Post::query()->whereIn('id', $lastFiveViewedIds)->where('hide', false)->get();

        view()->share([
            'siteSetting' => $siteSetting,
            'tags' => $tags,
            'viewedPosts' => $viewedPosts,
        ]);

        return $next($request);
    }
}
