<?php  
   require('connection.php');


   $utente = $_POST['user'];
   $pwd = $_POST['pwd'];
  
    
    $query = "SELECT * FROM credentials WHERE username='$utente'";
    if($result = $connection->query($query)){
        if($result->num_rows == 1){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if(password_verify($pwd, $row['password'])){
                echo "benvenuto";
                session_start();
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                header("location: index.php");
            }
        }
    }
    
  
?>