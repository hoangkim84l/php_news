<?php

namespace App\Console\Commands\General;

use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class UpdateXmlSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cfn-crawler:update-xml-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate XML sitemap';

    /**
     * Execute the console command.
     *
     * @return int|void
     */
    public function handle()
    {
        $data = '<?xml version="1.0" encoding="UTF-8"?>
                <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                <!-- created with Free Online Sitemap Generator www.cafesuanovel.com -->

            <url>
                <loc>https://cafesuanovel.com/</loc>
                <lastmod>' . Carbon::now()->format('Y-m-d') . 'T00:00:00+00:00</lastmod>
                <priority>1.00</priority>
            </url>
            <url>
                <loc>https://cafesuanovel.com/user/register.html</loc>
                <lastmod>' . Carbon::now()->format('Y-m-d') . 'T00:00:00+00:00</lastmod>
                <priority>0.80</priority>
            </url>
            <url>
                <loc>https://cafesuanovel.com/user/login.html</loc>
                <lastmod>' . Carbon::now()->format('Y-m-d') . 'T00:00:00+00:00</lastmod>
                <priority>0.80</priority>
            </url>
            <url>
                <loc>https://cafesuanovel.com/truyen.html</loc>
                <lastmod>' . Carbon::now()->format('Y-m-d') . 'T00:00:00+00:00</lastmod>
                <priority>0.80</priority>
            </url>
            <url>
                <loc>https://cafesuanovel.com/truyen/tim-nang-cao.html</loc>
                <lastmod>' . Carbon::now()->format('Y-m-d') . 'T00:00:00+00:00</lastmod>
                <priority>0.80</priority>
            </url>
            <url>
                <loc>https://cafesuanovel.com/lien-he.html</loc>
                <lastmod>' . Carbon::now()->format('Y-m-d') . 'T00:00:00+00:00</lastmod>
                <priority>0.80</priority>
            </url>
        ';

        $stories = Story::get();
        foreach ($stories as $record) {
            $data .= "<url>
                        <loc>https://cafesuanovel.com/xem-truyen/$record->slug/$record->id.html</loc>
                        <lastmod>" . Carbon::now()->format('Y-m-d') . "T00:00:00+00:00</lastmod>
                        <priority>0.60</priority>
                    </url>
                ";
        }

        $chapters = Chapter::get();
        foreach ($chapters as $record) {
            $story = Story::where('id', $record->story_id)->first();
            if ($story) {
                $data .= "<url>
                            <loc>https://cafesuanovel.com/truyen/$story->slug/$record->slug/$record->id.html</loc>
                            <lastmod>" . Carbon::now()->format('Y-m-d') . "T00:00:00+00:00</lastmod>
                            <priority>0.40</priority>
                        </url>
                    ";
            }
        }

        $data .= '</urlset>';

        Storage::put('sitemap.xml', $data);
        return self::SUCCESS;
    }
}
