<?php  
   require('connection.php');
   require('check_id.php');


   $utente = $_POST['user'];
   $pwd = $_POST['pwd'];
   $pass = hash("sha512",($pwd));
   
    $query = "SELECT * FROM user WHERE username='$utente' AND password='$pass'";
    if($result = $connection->query($query)){
        if($result->num_rows > 0){
            $row = $result->fetch_array();
            $_SESSION['id_utente'] = $row['id_utente'];
            $_SESSION['mail'] = $row['mail'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            header("location:index.php");
        }else{
            echo "credenziali errate!";
        }
    }
    
  
?>