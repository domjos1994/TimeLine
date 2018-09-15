<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'TimeLine',
    'description' => 'An extension to create TimeLines in the FE!',
    'category' => 'plugin',
    'author' => 'Dominic Joas',
    'author_company' => '',
    'author_email' => 'entwicklung@domjos.de',
    'state' => 'beta',
    'clearCacheOnLoad' => true,
    'version' => '0.0.2',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.9.99',
        ]
    ],
    'autoload' => [
        'psr-4' => [
            'DominicJoas\\Timeline\\' => 'Classes'
        ]
    ],
];
