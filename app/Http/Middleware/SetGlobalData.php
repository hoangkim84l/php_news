<?php

namespace App\Http\Middleware;

use App\Models\CoreConfig;
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
        $siteSetting = CoreConfig::find(1);

        // $storyIds = session()->get('recently_viewed', []);
        // $lastFiveViewedIds = array_slice($storyIds, -5);
        // $viewedStories = Story::whereIn('id', $lastFiveViewedIds)->get();

        view()->share([
            'siteSetting' => $siteSetting,
        ]);

        return $next($request);
    }
}
