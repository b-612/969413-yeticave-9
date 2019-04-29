<?php
declare(strict_types=1);
include_once('init.php');

$con = mysqli_connect("969413-yeticave-9", "root", "", "yeti_cave");

mysqli_set_charset($con, "utf8");

if (!$con) {
    echo("Ошибка подключения:" . mysqli_connect_error());
} else {
    $show_lots = "SELECT * FROM lot";
    $lots = mysqli_query($con, $show_lots);
    if(!$lots) {
        $error = mysqli_error($con);
        echo("Ошибка MySql:" . $error);
    }
    $show_cat = "SELECT * FROM categories";
    $cat = mysqli_query($con, $show_cat);
    if(!$cat) {
        $error = mysqli_error($con);
        echo("Ошибка MySql:" . $error);
    }
    $ads = mysqli_fetch_all($lots, MYSQLI_ASSOC);
    $categories = mysqli_fetch_all($cat, MYSQLI_ASSOC);
}

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
