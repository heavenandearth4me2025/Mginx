<?php

return [
    'paths' => ['login'],
    'allowed_methods' => ['POST'],
    'allowed_origins' => ['http://127.0.0.1:8000'],
    'allowed_headers' => ['Content-Type', 'X-Requested-With'],
    'supports_credentials' => true,
];
