<?php
declare(strict_types=1);
include_once('init.php');

$is_auth = rand(0, 1);
$user_name = 'Александр'; // укажите здесь ваше имя

$categories = getCat($con);
if(!isset($_GET['id'])) {
    $content = include_template('error.php', ['error' => 'В запросе отсутвует параметр id']);
    echo($content);
    die();
};

$id = (int) $_GET['id'];
$lot = getLot($con, $id);

$price = $lot['price'];

if ($lot['rate'] !== null) {
    $price = $lot['rate'];
}

if($lot == null) {
    $title = '404 Страница не найдена';
    http_response_code(404);
    $page_content = include_template('404.php', [
        'title' => $title
    ]);
} else {
    $title = $lot["title"];
    $page_content = include_template('lot.php', [
        'categories' => $categories,
        'lot' => $lot,
        'price' => $price
    ]);
};

$page_layout = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'title' => $title,
    'main_class' => ''
]);

echo($page_layout);
