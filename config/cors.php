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

    // Cors server
    'paths' => ['api/*', 'login', 'logout'], // Solo permitir rutas de la API
    'allowed_methods' => ['*'],
    'allowed_origins' => ['https://society-front.vercel.app'], // Permitir solo el frontend
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => ['Authorization'], // Permitir acceso al header del token
    'max_age' => 0,
    'supports_credentials' => true, // IMPORTANTE: debe ser false si usas solo tokens    

    // Cors Local
    // 'paths' => ['api/*', 'login', 'logout'], // Solo permitir rutas de la API
    // 'allowed_methods' => ['*'],
    // 'allowed_origins' => ['http://localhost:5173'], // Permitir solo el frontend
    // 'allowed_origins_patterns' => [],
    // 'allowed_headers' => ['*'],
    // 'exposed_headers' => ['Authorization'], // Permitir acceso al header del token
    // 'max_age' => 0,
    // 'supports_credentials' => false, // IMPORTANTE: debe ser false si usas solo tokens    

];
