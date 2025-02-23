<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*','sanctum/csrf-cookie','login','logout'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['https://society-front.vercel.app','https://login-prueba-opal.vercel.app'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => ['X-CSRF-TOKEN','Set-Cookie',],

    'max_age' => 0,

    'supports_credentials' => true,

];
