<?php

namespace App\Listeners;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class GetNotification
{
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = $event->user;

        try {
            $client = new Client();
            $response = $client->request('GET', 'http://127.0.0.1:8000/api/get-notification');
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
            if ($statusCode != 200) {
                Log::error('Error: Unexpected status code received - ' . $statusCode);
            }
        } catch (Exception $e) {
            Log::error('Exception caught: ' . $e->getMessage());
        }
    }
}
