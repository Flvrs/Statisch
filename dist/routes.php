<?php

return [
    '/' => [
        'template' => 'home.twig'
    ],
    '/articles' => [
        'template' => 'articles.twig'
    ],
    '/articles/{slug}' => [
        'template' => 'articles/{slug}.twig'
    ]
];