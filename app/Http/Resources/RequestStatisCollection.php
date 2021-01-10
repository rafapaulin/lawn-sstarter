<?php

namespace App\Http\Resources;

use App\Http\Resources\RequestStatisResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * BonsaiCollection
 *
 * Collection of users
 */
class RequestStatisCollection extends ResourceCollection {
    public    $preserveKeys = true;

    public function __construct($resource) {
        parent::__construct($resource);
        $this->resource = $this->collectResource($resource);
    }

    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public    $collects = RequestStatisResource::class;
}
