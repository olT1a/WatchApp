<?php

require('connection.php');

$mail = $_POST['mail'];
$utente = $_POST['user'];
$pwd = $_POST['pwd'];
$crypted_pwd = password_hash($pwd, PASSWORD_DEFAULT);

$sql = "INSERT INTO credentials (mail, username, password) VALUES ('$mail', '$utente', '$crypted_pwd')";
if($connection->query($sql) === true){
    echo "Registrazione avvenuta con successo";
}

?>