<?php
declare(strict_types=1);
include_once('init.php');

function formatting_amount (int $price): string
{
    if ($price < 1000) {
        $result = $price;
    } else {
        $result = number_format($price, 0, ',', ' ');
    }
    return $result . ' <b class="rub">р</b>';
}

function seconds_before_the_end (int $time, $end_time): int
{
    $different = $end_time - $time;
    return $different;
}

function is_little_time (int $s_before_end): string
{
    $finish_time = '';
    if ($s_before_end <= 3600) {
        $finish_time = 'timer--finishing';
    }
    return $finish_time;
}

function time_before_the_end (int $seconds): string
{
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);

    if ($minutes < 10) {
        $minutes = 0 . $minutes;
    }

    if ($hours < 10) {
        $hours = 0 . $hours;
    }

    $before_end = $hours . ':' . $minutes;
    return $before_end;
}

function getLots($con): array
{
    $lots = mysqli_fetch_all(mysqli_query($con, "SELECT categories.name AS category, lot.id, lot.name, lot.url, lot.price AS price, lot.completion_date, MAX(rate) AS rate FROM lot JOIN categories ON lot.category_id = categories.id LEFT JOIN rate ON lot.id = rate.lot_id WHERE lot.completion_date > now() GROUP BY lot.id ORDER BY date_add DESC"), MYSQLI_ASSOC);
    if ($lots !== false) {
        return $lots;
    }
    $error = mysqli_error($con);
    $content = include_template('error.php', ['error' => $error]);
    echo($content);
    die();

}

function getLot(mysqli $con, int $id): ?array
{
    $params[] = $id;
    $sql = "SELECT lot.id, lot.name AS title, lot.description, lot.url, lot.price, categories.name AS category, lot.completion_date, MAX(rate) AS rate FROM lot JOIN categories ON lot.category_id = categories.id LEFT JOIN rate ON lot.id = rate.lot_id WHERE lot.id = ? GROUP BY lot.id";
    $sql_prepare = db_get_prepare_stmt($con, $sql, $params);
    mysqli_stmt_execute($sql_prepare);
    $result = mysqli_stmt_get_result($sql_prepare);
    $lot = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if ($lot !== false) {
        return $lot;
    }
    $error = mysqli_error($con);
    $content = include_template('error.php', ['error' => $error]);
    echo($content);
    die();
}

function getCat($con): array
{
    $cats = mysqli_fetch_all(mysqli_query($con, "SELECT name, class FROM categories"), MYSQLI_ASSOC);
    if ($cats !== false) {
        return $cats;
    }
    $error = mysqli_error($con);
    $content = include_template('error.php', ['error' => $error]);
    echo($content);
    die();
}
