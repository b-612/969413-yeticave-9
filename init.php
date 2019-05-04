<?php
declare(strict_types=1);
date_default_timezone_set('Europe/Moscow');

include_once('helpers.php');
include_once('functions.php');

$con = mysqli_connect("969413-yeticave-9", "root", "", "yeti_cave");
mysqli_set_charset($con, "utf8");
if ($con === false) {
    include_template('error.php', ['error' => mysqli_connect_error($con)]);
    die();
}
