<?php
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

function seconds_before_the_end (int $time): int
{
    $end_time = strtotime("tomorrow midnight");
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
    $lots = mysqli_fetch_all(mysqli_query($con, "SELECT categories.name AS category, lot.name AS name, url, price FROM lot JOIN categories ON lot.category_id = categories.id WHERE completion_date > now() ORDER BY date_add DESC"), MYSQLI_ASSOC);
    if ($lots !== false) {
        return $lots;
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
