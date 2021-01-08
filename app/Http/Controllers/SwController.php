<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Jobs\SwApiStatisticsJob;
use Illuminate\Http\JsonResponse;

class SwController extends Controller {
    /**
     * http
     *
     * Http client
     *
     * @var \GuzzleHttp\Client
     */
    private Client $http;

    public function __construct() {
        $this->http = new Client(['base_uri' => 'https://swapi.dev/api/']);
    }

    public function swApi(Request $request): JsonResponse {
        $apiPath   = str_replace('sw-data/', '', $request->path());
        $query     = $request->query() ?: null;

        $startTime = microtime(true);
        $response  = $this->http->get($apiPath, ['query' => $query]);
        $totalTime = round((microtime(true) - $startTime) * 1000);

        dispatch(new SwApiStatisticsJob([
            'path'               => "/$apiPath",
            'query'              => http_build_query($query ?: []),
            'response_time_ms'   => $totalTime,
            'payload_size_bytes' => $response->getBody()->getSize(),
        ]));

        return response()->json(json_decode($response->getBody()->getContents(), true));
    }
}
