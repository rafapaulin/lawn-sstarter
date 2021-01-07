<?php

namespace App\Http\Controllers;

use App\Jobs\ExampleJob;
use Illuminate\Support\Facades\Log;

class ExampleController extends Controller {
    public function test() {
        Log::info('dispatching job');
        dispatch(new ExampleJob)->onQueue('api-calls');
        Log::info('job dispatched');

        // echo '<pre>' . print_r('test', true) . '</pre>'; die();
    }
}
