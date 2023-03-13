<?php  
   session_start();
   require('connection.php');
   require('check_id.php');

   $mail = $_POST['mail'];
   $utente = $_POST['user'];
   $pwd = $_POST['pwd'];
   $pass = md5($pwd);
   $not_empty = [];

    if(!empty($mail)){
        $not_empty = array_push($not_empty,$mail);
    }
    if(!empty($utente)){
        $not_empty = array_push($not_empty,$utente);
    }
    if(!empty($pwd)){
        $not_empty = array_push($not_empty,$pass);
    }

    for($i = 0; $i < count($not_empty); $i++)
        $query = "UPDATE user SET lastname='Doe' WHERE id=2";

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