<?php

namespace App\Console\Commands;

use App\Services\CollectUrlService;
use Illuminate\Console\Command;

class SaveUrl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:save-url';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save URL to the database.';

    /**
     * Execute the console command.
     */
    public function handle(CollectUrlService $collectUrlService)
    {
        // $collectUrlService->store();
    }
}
