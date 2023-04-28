<?php

namespace App\models;

Class UserModel
{
    private $connection;
    protected int $id;
    protected string $mail;
    protected string $username;
    protected string $password;

    public function __construct()
    {
        $this->connection = new \mysqli('127.0.0.1', 'root', '', 'watchapp');
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getId(int $id): int
    {
        return $this->id;
    }

    public function getMail(string $mail): string
    {
        return $this->mail;
    }

    public function getUsername(string $username): string 
    {
        return $this->username;
    }

    public function getPassword(string $password): string
    {
        return $this->password;
    }
    public function addUser(): string
    {
        $mail = $_POST['mail'];
        $utente = $_POST['user'];
        $pwd = $_POST['pwd'];
        $pass = hash("sha512", $pwd);

        $query = "INSERT INTO user (mail, username, password) VALUES ('$mail', '$utente', '$pass')";

        if($this->connection->query($query) === true){
            return "ADDED";
        } else{
            return "ERROR";
        }   
    }

    public function login(): string
    {
        $utente = $_POST['user'];
        $pwd = $_POST['pwd'];
        $pass = hash("sha512", $pwd);

        $query = "SELECT * FROM user WHERE username='$utente' AND password='$pass'";
        if ($result = $this->connection->query($query)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_array();
                $_SESSION['id_utente'] = $row['id_utente'];
                $_SESSION['mail'] = $row['mail'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                return 'OK';   //gli header in base alla location
            } else {
                return 'credenziali errate';
                
            }
        }
        return "problema";
    }

    public function change_credentials(): string
    {
        $update = null;
        $id_session = $_SESSION['id_utente'];
        $mail = $_POST['mail'];
        $utente = $_POST['user'];
        $new_pass = null;

        //se è impostata la nuova password quella vecchia viene sostituita
        if (!empty($_POST['new_pwd'])) {
            $old_pwd = $_POST['old_pwd'];
            $old_pass = hash("sha512", ($old_pwd));
            $query = "SELECT * from user WHERE id_utente = '$id_session'";
            if ($result = $this->connection->query($query)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_array();
                    //var_dump($row);
                    if ($old_pass == $row['password']) {
                        $new_pass = hash("sha512", ($_POST['new_pwd']));
                        $update = "UPDATE user SET mail='$mail', username='$utente', password='$new_pass' WHERE id_utente='$id_session'";
                        $this->connection->query($update);
                        session_destroy();
                        return 'credenziali cambiate';
                        //logout

                    } else {
                        return 'credenziali errate';
                    }
                } else {
                    return 'utente non trovato';
                }
            } else {
                return 'problema';
            }

        } else {   //se non è impostata la nuova password quela vecchia rimane uguale
            $update = "UPDATE user SET mail='$mail', username='$utente' WHERE id_utente='$id_session'";
            $this->connection->query($update);
            session_destroy();
            return 'credenziali cambiate';
        }
    }

    public function logout(): bool
    {
        session_destroy();
        return true;
    }


}

?>