<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class HandleSavingsWebhook extends ProcessWebhookJob
{
    public function handle()
    {
        Log::info('found');
        $webhookCall = $this->webhookCall;
        Log::info('saved webhook call: ' . $webhookCall);
        // Process the webhook data here
        $data = $webhookCall->payload;
        // Example: $amount = $data['key']['amount'];
        // Save or process the data as needed

        Log::info('Processing savings webhook', ['data' => $data]);
    }
}

