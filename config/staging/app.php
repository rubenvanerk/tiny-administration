<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => 'https://tiny.wrve.nl',

    /*
    |--------------------------------------------------------------------------
    | Trusted hosts
    |--------------------------------------------------------------------------
    |
    | You may specify valid hosts for your application as an array or boolean
    | below. This helps prevent host header poisoning attacks.
    |
    | Possible values:
    |  - `true`: Trust the host specified in app.url, as well as the "www"
    |            subdomain, if applicable.
    |  - `false`: Disable the trusted hosts feature.
    |  - array: Defines the domains to be trusted hosts. Each item should be
    |           a string defining a domain, IP address, or a regex pattern.
    |
    | Example of array values:
    |
    |    'trustedHosts' => [
    |       'example.com',           // Matches just example.com
    |       'www.example.com',       // Matches just www.example.com
    |       '^(.+\.)?example\.com$', // Matches example.com and all subdomains
    |       'https://example.com',   // Matches just example.com
    |    ],
    |
    | NOTE: Even when set to `false`, this functionality is explicitly enabled
    | on the Backend password reset flow for security reasons.
    */

    'trustedHosts' => 'tiny.wrve.nl',

];
