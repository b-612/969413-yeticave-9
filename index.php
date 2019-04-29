<?php
declare(strict_types=1);
include_once('init.php');

$show_lots = "SELECT categories.name AS category, lot.name AS name, url, price FROM lot JOIN categories ON lot.category_id = categories.id";
$show_cat = "SELECT name, class FROM categories";

$ads = getLots($con, $show_lots);
$categories = getCat($con, $show_cat);

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
    'title' => 'Yeti Cave – Главная страница'
]);

echo($page_layout);
