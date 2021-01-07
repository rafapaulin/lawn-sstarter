<?php

namespace App\Http\Controllers;

use App\Jobs\ExampleJob;

class ExampleController extends Controller {
    public function test() {
        dispatch(new ExampleJob)->onQueue('api-calls');

        // echo '<pre>' . print_r('test', true) . '</pre>'; die();
    }
}
