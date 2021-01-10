<?php

namespace App\Jobs;

use App\Models\SwApiRequest;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\RequestStatisCollection;
use App\Http\Resources\RequestStatisResource;

class CalculateStatisticsJob extends Job {
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        Cache::forget('statistics');

        Cache::rememberForever('statistics', function () {
            return [
                'totalQueries' => SwApiRequest::count(),
                'lastThree' => new RequestStatisCollection(SwApiRequest::latest()->limit(3)->get()),
                'mostPopular' => SwApiRequest::selectRaw('COUNT(*) AS count, path')->groupBy('path')->orderBy('count', 'DESC')->first(),
                'leastPopular' => SwApiRequest::selectRaw('COUNT(*) AS count, path')->groupBy('path')->orderBy('count', 'ASC')->first(),
                'smallest' => new RequestStatisResource(SwApiRequest::orderBy('payload_size_bytes', 'ASC')->first()),
                'largest' => new RequestStatisResource(SwApiRequest::orderBy('payload_size_bytes', 'DESC')->first()),
                'fastest' => new RequestStatisResource(SwApiRequest::orderBy('response_time_ms', 'ASC')->first()),
                'slowest' => new RequestStatisResource(SwApiRequest::orderBy('response_time_ms', 'DESC')->first()),
            ];
        });
    }
}
