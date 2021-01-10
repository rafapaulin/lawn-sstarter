<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class StatisticsController extends Controller {
    public function stats(): JsonResponse {
        return response()->json(Cache::get('statistics', ['message' => 'statistics not yet calculated']));
    }
}
