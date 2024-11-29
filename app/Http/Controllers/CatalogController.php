<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catalog;

class CatalogController extends Controller
{
    public function show(string $slug)
    {
        $catalog = Catalog::where('slug', $slug)->first();
        return view('layouts.stories.catalog', compact('catalog'));
    }
}
