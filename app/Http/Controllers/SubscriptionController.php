<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Http\Requests\StoreSubscriptionRequest;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    /**
     * Store a subscription
     *
     * @param  \App\Models\Website  $website
     * @param  \App\Http\Requests\StoreSubscriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Website $website, StoreSubscriptionRequest $request)
    {
        // Create the subscription
        $subscription = $website->subscriptions()->create($request->validated());

        return response()->json(['message' => 'Subscription created successfully']);
    }
}
