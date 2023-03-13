<?php

require('connection.php');

$mail = $_POST['mail'];
$utente = $_POST['user'];
$pwd = $_POST['pwd'];
$pass = hash("sha512",$pwd);

$sql = "INSERT INTO user (mail, username, password) VALUES ('$mail', '$utente', '$pass')";
if($connection->query($sql) === true){
    echo "Registrazione avvenuta con successo";
    header("location:login_page.php");
}

?>