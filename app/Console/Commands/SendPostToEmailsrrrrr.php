<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Jobs\SendPostEmails;

class SendPostToEmailsCommanddd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-posts-to-emailsrrrr';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description =
        'Send posts to emails of subscribers of websites that have new posts';

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
         // Get all the posts that haven't been sent to subscribers yet
         $posts = Post::whereDoesntHave('emails')->get();

         // Dispatch a job to send emails to subscribers for each post
         foreach ($posts as $post) {
            SendPostEmails::dispatch($post);
         }
    }
}
