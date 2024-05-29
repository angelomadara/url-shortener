<?php

namespace App\Jobs;

use App\Services\CollectUrlService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveUrl implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request_data;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->request_data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(CollectUrlService $collectUrlService): void
    {
        $request = $this->request_data;

        $response = $collectUrlService->store($request);

        $email = $request['email'];
        \Log::info('Email: ', [$email]);

        // Send email if email is provided
        if ($email) {
            $urlKey = $response->url_key; 

            $data = [
                'shortURL' => $urlKey,
            ];

            \Mail::send('emails.shortURL', $data, function ($message) use ($email) {
                $message->to($email)->subject('Short URL');
            });
        }
        
    }
}
