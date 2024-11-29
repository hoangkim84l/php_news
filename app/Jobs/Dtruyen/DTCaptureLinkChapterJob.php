<?php

namespace App\Jobs\Dtruyen;

use App\Models\LinkChapter;
use App\Models\LinkChapterHistory;
use App\Models\LinkTruyen;
use Exception;
use Goutte\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class DTCaptureLinkChapterJob implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the tags that should be assigned to the job.
     *
     * @return array<int, string>
     */
    public function tags(): array
    {
        return [
            'capture_link_chapter_job'
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        LinkTruyen::where('status', LinkTruyen::STATUS_PROCESS)
            ->where('type', LinkTruyen::TYPE_DT)
            ->chunkById(1000, function ($records) {
                foreach ($records as $data) {
                    // link story
                    $client = new Client();
                    $crawler = $client->request('GET', $data->link);

                    try {
                        $title = $crawler->filter('h1.title')->each(function ($node) {
                            return $node->text();
                        });

                        if (empty($title)) {
                            Log::info('DTCaptureLinkChapterJob ko có title: ' . $data->link);
                            continue;
                        }

                        $title = $title[0];
                        $title = strtolower($title);
                        $title = ucfirst($title);

                        $crawler->filterXPath("//div[@id='chapters']//a")->each(function ($node) use ($title) {
                            /** @var Crawler $node */
                            $history = LinkChapterHistory::where('link', $node->attr('href'))->first();
                            if (!$history) {
                                LinkChapter::updateOrCreate(
                                    ['link' => $node->attr('href')],
                                    [
                                        'name' => $node->text(),
                                        'link' => $node->attr('href'),
                                        'status' => LinkChapter::STATUS_PENDING,
                                        'source' => ltrim($title, " "),
                                        'type' => LinkTruyen::TYPE_DT,
                                    ]
                                );
                            }
                        });
                    } catch (Exception $e) {
                        Log::info($e->getMessage());
                    }
                }
            });
    }
}
