<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Http\Requests\StorePostRequest;
use App\Jobs\SendPostEmails;

class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Website  $website
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Website $website, StorePostRequest $request )
    {
        try {
            // Create the post
            $post = $website->posts()->create($request->validated());

            // Dispatch a job to send emails to subscribers
            SendPostEmails::dispatch($post);

            //return the post
            return response()->json([
                'message' => 'Post created successfully',
                'post' => $post
            ]);

        } catch (\Exception $e) {
            //send error message
            return response()->json(['message' => 'Post not created due to error']);
        }
    }
}
