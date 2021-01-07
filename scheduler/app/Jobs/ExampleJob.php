<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;

class ExampleJob extends Job {
    private $origin;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct() {
        $this->origin = 'scheduler';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        Log::debug('Scheduler job is done!');
    }
}
