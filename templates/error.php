<?php
include_once('init.php');

echo("Ошибка соединения с базой данных:" . mysqli_connect_error($con));
