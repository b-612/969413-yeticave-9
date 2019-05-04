<?php
declare(strict_types=1);
include_once('init.php');

$categories = getCat($con);

$is_auth = rand(0, 1);
$user_name = 'Александр'; // укажите здесь ваше имя

if(getLot($con) == null) {
    $lot = ['title' => '404 Страница не найдена'];
    $title = $lot['title'];
    $page_content = include_template('404.php', [
        'title' => $title
    ]);
} else {
    $lot = getLot($con);
    $page_content = include_template('lot.php', [
        'categories' => $categories,
        'lot' => $lot
    ]);
};

$page_layout = include_template('lot-layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'title' => $lot['title']
]);

echo($page_layout);
