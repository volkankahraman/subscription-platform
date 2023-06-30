<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Bus\Queueable;
use App\Models\Post;
use App\Mail\PostEmail;




class SendPostEmails
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function handle()
    {
        // Get the subscriptions who haven't received the post email yet
        $subscriptions = $this->post->website->subscriptions()->whereDoesntHave('emails', function ($query) {
            $query->where('post_id', $this->post->id);
        })->get();

        // Send the post email to each subscription
        foreach ($subscriptions as $subscription) {
            Mail::to($subscription->email)->send(new PostEmail($this->post));
            $subscription->emails()->create(['post_id' => $this->post->id]);
        }
    }
}
