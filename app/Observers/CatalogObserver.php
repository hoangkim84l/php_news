<?php
namespace App\Observers;

use App\Models\Catalog;
use Illuminate\Support\Str;

class CatalogObserver
{
    public function creating(Catalog $catalog)
    {
        $catalog->slug = Str::slug($catalog->name);
    }

    public function updating(Catalog $catalog)
    {
        if ($catalog->isDirty('name')) {
            $catalog->slug = Str::slug($catalog->name);
        }
    }
}