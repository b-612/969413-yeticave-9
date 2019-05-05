<?php
declare(strict_types=1);
include_once('init.php');

$ads = getLots($con);
$categories = getCat($con);

$is_auth = rand(0, 1);
$user_name = 'Александр'; // укажите здесь ваше имя

$page_content = include_template('index.php', [
    'categories' => $categories,
    'ads' => $ads
]);

$page_layout = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'title' => 'Yeti Cave – Главная страница',
    'main_class' => 'class=\'container\''
]);

echo($page_layout);
