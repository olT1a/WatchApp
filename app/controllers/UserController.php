<?php

namespace App\controllers;

class UserController
{
    public function loginHandler()
    {
        require('../app/database/connection.php');
        require('../app/functions.php');


        $utente = $_POST['user'];
        $pwd = $_POST['pwd'];
        $pass = hash("sha512", ($pwd));

        $query = "SELECT * FROM user WHERE username='$utente' AND password='$pass'";
        if ($result = $connection->query($query)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_array();
                $_SESSION['id_utente'] = $row['id_utente'];
                $_SESSION['mail'] = $row['mail'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                header("Location:home");
            } else {
                echo 'credenziali errate';
                header("Location:login");
            }
        }
    }

    public function signUpHandler()
    {
        require('../app/database/connection.php');

        $mail = $_POST['mail'];
        $utente = $_POST['user'];
        $pwd = $_POST['pwd'];
        $pass = hash("sha512", $pwd);

        $sql = "INSERT INTO user (mail, username, password) VALUES ('$mail', '$utente', '$pass')";
        if ($connection->query($sql) === true) {
            header("location:login");
        }
    }

    public function change_credentialsHandler()
    {
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
    }

    public function LogoutHandler()
    {
        session_destroy();
        header("Location:home");

    }

    public function RegistrationHandler()
    {
        require('../app/database/connection.php');

        $mail = $_POST['mail'];
        $utente = $_POST['user'];
        $pwd = $_POST['pwd'];
        $pass = hash("sha512", $pwd);

        $sql = "INSERT INTO user (mail, username, password) VALUES ('$mail', '$utente', '$pass')";
        if ($connection->query($sql) === true) {
            header("location:login");
        }
    }

}



?>