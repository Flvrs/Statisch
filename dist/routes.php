<?php

return [
    '/' => [
        'template' => 'home.twig',
        'content' => 'home.md'
    ],
    '/articles' => [
        'template' => 'articles.twig',
        'content' => 'articles.md'
    ],
    '/articles/{slug}' => [
        'template' => 'article.twig',
        'content' => 'articles/{slug}.md',
    ]
];