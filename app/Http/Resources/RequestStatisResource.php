<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource as Resource;

/**
 * BonsaiResource
 *
 * User data
 */
class RequestStatisResource extends Resource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        return [
            'path'             => $this->path,
            'query'            => $this->query,
            'responseTimeMs'   => $this->response_time_ms,
            'payloadSizeBytes' => $this->payload_size_bytes,
        ];
    }
}
