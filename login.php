<?php  
   require('connection.php');


   $utente = $_POST['user'];
   $pwd = $_POST['pwd'];
   $pass = md5($pwd);
   
    $query = "SELECT * FROM user WHERE username='$utente' AND password='$pass'";
    if($result = $connection->query($query)){
        if($result->num_rows > 0){
            $row = $result->fetch_array();
            session_start();
            $_SESSION['id_utente'] = $row['id_utente'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            header("location:index.php");
        }else{
            echo "credenziali errate!";
        }
    }
    
  
?>