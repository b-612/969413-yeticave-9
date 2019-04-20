<?php
declare(strict_types=1);
include_once('init.php');

$is_auth = rand(0, 1);
$user_name = 'Александр'; // укажите здесь ваше имя

$categories = [
    [
        'name' => 'Доски и лыжи',
        'class' => 'promo__item--boards'
    ],
    [
        'name' => 'Крепления',
        'class' => 'promo__item--attachment'
    ],
    [
        'name' => 'Ботинки',
        'class' => 'promo__item--boots'
    ],
    [
        'name' => 'Одежда',
        'class' => 'promo__item--clothing'
    ],
    [
        'name' => 'Инструменты',
        'class' => 'promo__item--tools'
    ],
    [
        'name' => 'Разное',
        'class' => 'promo__item--other'
    ]
];

$ads = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => $categories[0]['name'],
        'price' => 10999,
        'url' => 'img/lot-1.jpg'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => $categories[0]['name'],
        'price' => 159999,
        'url' => 'img/lot-2.jpg'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => $categories[1]['name'],
        'price' => 8000,
        'url' => 'img/lot-3.jpg'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => $categories[2]['name'],
        'price' => 10999,
        'url' => 'img/lot-4.jpg'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => $categories[3]['name'],
        'price' => 7500,
        'url' => 'img/lot-5.jpg'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category' => $categories[5]['name'],
        'price' => 5400,
        'url' => 'img/lot-6.jpg'
    ]
];

$page_content = include_template('index.php', [
    'categories' => $categories,
    'ads' => $ads,
    'little_time' => $little_time,
    'time_before_the_end' => $time_before_the_end
]);
$page_layout = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'title' => 'Yeti Cave – Главная страница'
]);

echo($page_layout);
