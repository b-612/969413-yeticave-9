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
