<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SwApiRequest extends Model {
    protected $fillable = [
        'path',
        'query',
        'response_time_ms',
        'payload_size_bytes',
    ];
}
