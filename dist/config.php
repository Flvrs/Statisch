<?php
return [
    'public_dir' => './public',
    'content_dir' => './content',
    'static_dir' => './static',

    'copy_to_public' => [
        './static/css' => './public/resources/css',
        './static/js' => './public/resources/js',
        './static/img' => './public/resources/images'
    ],

    'variables' => [
        'title' => 'Statisch',
        'css' => [
            'resources/css/normalize.css',
            'resources/css/style.css'
        ],
        'js' => [
            'resources/js/main.js'
        ]
    ]
];