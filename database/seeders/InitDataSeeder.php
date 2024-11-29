<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('catalogs')->updateOrInsert([
            'slug' => 'highlight'
        ],[
            'name' => 'Highlight',
            'img_link' => 'test-data.png',
            'site_title' => 'site title',
            'site_keys' => 'site keys',
            'site_description' => 'site description',
            'content' => 'This is content',
            'hide' => false,
        ]);

        DB::table('posts')->updateOrInsert([
            'slug' => 'highlight'
        ],[
            'name' => 'Bài post số  1',
            'img_link' => 'test-data.png',
            'site_title' => 'site title',
            'site_keys' => 'site keys',
            'site_description' => 'site description',
            'content' => 'This is content',
            'view' => 1,
            'hide' => false,
        ]);

        DB::table('core_configs')->updateOrInsert([
            'site_name' => 'My Review'
        ],[
            'site_url' => 'https://my-review.xyz',
            'site_key' => 'my-review',
            'site_title' => 'site title',
            'site_description' => 'site description',
            'config' => 'key',
        ]);
    }
}
