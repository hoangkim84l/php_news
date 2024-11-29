<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catalog;

class CatalogController extends Controller
{
    public function show(string $slug)
    {
        $catalog = Catalog::where('slug', $slug)->first();
        $catalog = $catalog->load('posts');
        return view('layouts.catalogs.list', compact('catalog'));
    }
}
