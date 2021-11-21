<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Notifications\SendPostToSubscriber;
use Illuminate\Console\Command;

class SendEmailToSubscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriber:send-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to subscriber with new post published';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = Post::where('notified', 0)->get();

        foreach($posts as $post){
            foreach ($post->website->subscribers as $subscriber){
                $subscriber->notify(new SendPostToSubscriber($post));
            }
            $post->notified = 1;
            $post->save();
        }
    }
}
