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
    }
}
