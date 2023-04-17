<?php

$ip = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'watchapp';

$connection = new mysqli($ip, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>