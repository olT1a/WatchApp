<?php

namespace App\models;

class UserModel
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

    public function getId(): int
    {
        return $this->id;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function addUser(): string
    {
        $query = "INSERT INTO user (mail, username, password) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("sss", $this->mail, $this->username, $this->password);
        if ($stmt->execute() == true) {
            return "ADDED";
        } else {
            return "ERROR";
        }
    }

    public function login(): string
    {
        $query = "SELECT * FROM user WHERE username=? AND password=?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ss", $this->username, $this->password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
            $_SESSION['id_utente'] = $row['id_utente'];
            $_SESSION['mail'] = $row['mail'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            return 'OK';
        } else {
            return 'credenziali errate';
        }

    }

    public function change_credentials(): string
    {
        $update = null;
        $new_pass = null;

        //se è impostata la nuova password quella vecchia viene sostituita
        if (!empty($_POST['new_pwd'])) {
            $old_pwd = $_POST['old_pwd'];
            $old_pass = hash("sha512", ($old_pwd));
            $query = "SELECT * from user WHERE id_utente = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_array();
                if ($old_pass == $row['password']) {
                    $new_pass = hash("sha512", ($_POST['new_pwd']));
                    $update = "UPDATE user SET mail=?, username=?, password=? WHERE id_utente=?";
                    $stmt = $this->connection->prepare($update);
                    $stmt->bind_param("sssi", $this->mail, $this->username, $new_pass, $this->id);
                    $stmt->execute();
                    session_destroy();
                    return 'credenziali cambiate';

                } else {
                    return 'credenziali errate';
                }
            } else {
                return 'utente non trovato';
            }


        } else { //se non è impostata la nuova password quela vecchia rimane uguale
            $update = "UPDATE user SET mail=?, username=? WHERE id_utente=?";
            $stmt = $this->connection->prepare($update);
            $stmt->bind_param("ssi", $this->mail, $this->username,$this->id);
            $stmt->execute();
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