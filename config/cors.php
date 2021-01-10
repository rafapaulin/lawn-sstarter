<?php

return [
    'allowedOrigins' => [
        'http://localhost',
        'https://localhost',
        'http://localhost:8080',
        'https://localhost:8080',
    ],
    'allowedHeaders' => [
        'Authorization',
        'Content-Type',
        'Origin',
        'Access-Control-Allow-Origin',
        'Accept',
        'Accept-Language',
        'Origin',
        'User-Agent',
        'Process-Data',
    ],
    'allowedMethods' => [
        'HEAD',
        'GET',
        'POST',
        'PUT',
        'PATCH',
        'DELETE',
        'OPTIONS',
    ],
];
