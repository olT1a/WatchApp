<?php
$update = null;
require('connection.php');
require('check_id.php');

$id_session = $_SESSION['id_utente'];
$mail = $_POST['mail'];
$utente = $_POST['user'];
$new_pass;
//isset($_POST['new_pwd'])
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
        header("location:login_page.php");
        session_destroy();
      }else{
        echo "credenziali errate";
        header("location: change_credentials_page.php");
      }
    }
  }

}else{
  $update = "UPDATE user SET mail='$mail', username='$utente' WHERE id_utente='$id_session'";
  $connection->query($update);
  header("location:login_page.php");
  session_destroy();
}


?>