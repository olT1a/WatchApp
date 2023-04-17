<?php

$update = null;
require('../app/database/connection.php');
require('../app/functions.php');
checkId();

$id_session = $_SESSION['id_utente'];
$mail = $_POST['mail'];
$utente = $_POST['user'];
$new_pass;

if (!empty($_POST['new_pwd'])) {
  $old_pwd = $_POST['old_pwd'];
  $old_pass = hash("sha512", ($old_pwd));
  $query = "SELECT * from user WHERE id_utente = '$id_session'";
  if ($result = $connection->query($query)) {
    if ($result->num_rows > 0) {
      $row = $result->fetch_array();
      //var_dump($row);
      if ($old_pass == $row['password']) {
        $new_pass = hash("sha512", ($_POST['new_pwd']));
        $update = "UPDATE user SET mail='$mail', username='$utente', password='$new_pass' WHERE id_utente='$id_session'";
        $connection->query($update);
        session_destroy();
        header("location:login");
        //logout
        
      } else {
        echo "credenziali errate";
        header("location: change_credentials");
      }
    }
  }

} else {
  $update = "UPDATE user SET mail='$mail', username='$utente' WHERE id_utente='$id_session'";
  $connection->query($update);
  session_destroy();
  header("location:login");
}


?>