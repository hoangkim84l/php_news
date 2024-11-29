<?php

namespace App\Console\Commands\General;

use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class UpdateSlugCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cfn-crawler:update-slug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Slug of Stories and Chapters';

    /**
     * Execute the console command.
     *
     * @return int|void
     */
    public function handle()
    {
        Story::chunkById(500, function ($records) {
            foreach ($records as $record) {
                $record->update(['slug' => Str::slug($record->name)]);
            }
        });

        Chapter::chunkById(500, function ($records) {
            foreach ($records as $record) {
                $record->update(['slug' => Str::slug($record->name)]);
            }
        });

        return self::SUCCESS;
    }
}
