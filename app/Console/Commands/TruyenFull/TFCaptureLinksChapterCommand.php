<?php

namespace App\Console\Commands\TruyenFull;

use App\Jobs\TruyenFull\TFCaptureLinkChapterJob;
use Illuminate\Console\Command;

class TFCaptureLinksChapterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cfn-crawler:tf_capture_link_chapter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Craw link chapter';

    /**
     * Execute the console command.
     *
     * @return int|void
     */
    public function handle()
    {
        TFCaptureLinkChapterJob::dispatch();
    }
}
