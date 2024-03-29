<?php

$endpoint = 'http://149.129.244.179/';

return [
    'development' => [
        // Testimoni
        'get_testi' => $endpoint . 'api/testimoni',

        // service
        'get_service' => $endpoint . 'api/service',

        // treatment
        'get_treatment' => $endpoint . 'api/treatment',

        //booking
        'get_booking' => $endpoint . 'api/booking',
        'post_booking' => $endpoint . 'api/booking',

        // qr
        'post_qr' => $endpoint . 'api/generateqr',

        // invoice
        // 'get_invoice' => $endpoint . 'api/invoice',




        // Authentication
        'register' => $endpoint . 'api/register',
        'login' => $endpoint . 'api/login',

        'headers' => [
            'Authorization' => 'Bearer ' . (isset($_COOKIE['token_auth']) ? $_COOKIE['token_auth'] : ''),
        ],
    ],
    'production' => [
        // Uncomment and update the following lines with your production endpoints
        // 'get_endpoint' => 'https://api.example.com',
        // 'post_endpoint' => 'https://api.example.com/post',
        // 'edit_endpoint' => 'https://api.example.com/edit',
    ],
];
