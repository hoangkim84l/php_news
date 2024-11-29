<?php

namespace App\Jobs\MailToUser;

use App\Mail\NewChapterMail;
use App\Models\Lovelists;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendNewChapterJob implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $storyId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($storyId)
    {
        $this->storyId = $storyId;
    }

    /**
     * Get the tags that should be assigned to the job.
     *
     * @return array<int, string>
     */
    public function tags(): array
    {
        return [
            'send_new_chapter_to_end_user'
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $loveLists = Lovelists::where('story_id', $this->storyId)->get();
            foreach ($loveLists as $data) {
                if (!$data->user_email) {
                    continue;
                }

                $mailData = [
                    'title' => 'Mail from Cafesuanovel.com',
                    'body' => 'Truyện bạn yêu thích vừa được cập nhật chap mới truy cập ngay cafesuanovel.com :)'
                ];

                Mail::to($data->user_email)->send(new NewChapterMail($mailData));
            }
        } catch (Exception $e) {
            Log::info($e->getMessage());
        }
    }
}
