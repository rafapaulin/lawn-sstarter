<?php

namespace App\Jobs;

use App\Models\SwApiRequest;

class SwApiStatisticsJob extends Job {
    /**
     * requestData
     *
     * Api request statistics data
     *
     * @var array
     */
    private array $requestData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $requestData) {
        $this->requestData = $requestData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        SwApiRequest::create($this->requestData);
    }
}
