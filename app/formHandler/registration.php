<?php

require('../app/database/connection.php');

$mail = $_POST['mail'];
$utente = $_POST['user'];
$pwd = $_POST['pwd'];
$pass = hash("sha512", $pwd);

$sql = "INSERT INTO user (mail, username, password) VALUES ('$mail', '$utente', '$pass')";
if ($connection->query($sql) === true) {
    header("location:login");
}

?>