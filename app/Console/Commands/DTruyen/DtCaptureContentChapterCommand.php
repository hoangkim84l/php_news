<?php

namespace App\Console\Commands\DTruyen;

use App\Jobs\Dtruyen\DTCaptureContentJob;
use Illuminate\Console\Command;

class DtCaptureContentChapterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cfn-crawler:dt_capture_content_chapter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'DT Craw content';

    /**
     * Execute the console command.
     *
     * @return int|void
     */
    public function handle()
    {
        DTCaptureContentJob::dispatch();
    }
}
