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

$s_before_the_end = seconds_before_the_end ($timezone);

function seconds_before_the_end ($time)
{
    $time_now = strtotime('now');
    $end_time = strtotime("tomorrow midnight");
    $different = $end_time - $time_now;
    return $different;
}

$little_time = is_little_time($s_before_the_end);

function is_little_time ($s_before_end)
{
    $finish_time = '';
    if ($s_before_end <= 3600) {
        $finish_time = 'timer--finishing';
    }
    return $finish_time;
}

$time_before_the_end = time_before_the_end ($s_before_the_end);


function time_before_the_end ($seconds): string
{
    $minutes = floor($seconds / 60);
    $hours = floor($minutes / 60);
    $days = floor($hours / 24);

    if ($minutes >= 60) {
        $minutes = $minutes - ($hours * 60);
    }

    if ($seconds < 60 && $seconds > 0) {
        $minutes = 1;
    }

    if ($minutes < 10) {
        $minutes = 0 . $minutes;
    }

    if ($hours >= 24) {
        $hours = $hours - ($days * 24);
    }

    if ($hours < 10) {
        $hours = 0 . $hours;
    }

    if ($days < 10) {
        $days = 0 . $days;
    }

    $before_end = $hours . ':' . $minutes;
    return $before_end;
}
