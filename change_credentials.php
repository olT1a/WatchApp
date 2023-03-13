<?php  
   session_start();
   require('connection.php');
   require('check_id.php');
   $id_session = $_SESSION['id_utente'];
   $mail = $_POST['mail'];
   $utente = $_POST['user'];
   $pwd = $_POST['pwd'];
   $pass = md5($pwd);

   $update = "UPDATE user SET mail='$mail', username='$utente', password='$pass' WHERE id_utente='$id_session'";
   if($result = $connection->query($update)){
     header("location:personal_area.php");        
   }
        
    
    
?>