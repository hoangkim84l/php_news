<?php

namespace App\Console\Commands\DTruyen;

use App\Jobs\Dtruyen\DTCaptureLinkChapterJob;
use Illuminate\Console\Command;

class DTCaptureLinksChapterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cfn-crawler:dt_capture_link_chapter';

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
        DTCaptureLinkChapterJob::dispatch();
    }
}
