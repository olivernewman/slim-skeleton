<?php

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'debug'               => true,
        'whoops.editor'       => 'phpstorm',

        'service_directories' => [
            'services'    => APP_ROOT.'/config/Services/',
            'middlewares' => APP_ROOT.'/config/Middleware/',
            'routes'      => APP_ROOT.'/config/Routes/',
        ],
        // Renderer settings
        'renderer' => [
            'template_path' => [
                __DIR__ . '/../templates/',

                'V1' => [
                    __DIR__ . '/../templates/V1/'
                ],

                'errors' => [
                    __DIR__ . '/../templates/errors/',
                ],
            ],
            'twig' => [
                'debug' => true,
                'auto_reload' => true,
            ]
        ],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];
