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
        $this->connection = new \mysqli('127.0.0.1', 'watchapp', 'oscar', 'watchapp');
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
        $this->connection->begin_transaction();
        try{
            $query = "INSERT INTO user (mail, username, password) VALUES (?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("sss", $this->mail, $this->username, $this->password);
            $stmt->execute();
            $this->connection->commit();
            return "ADDED";
        }catch(\mysqli_sql_exception $exception){
            $this->connection->rollback();
            return "ERROR";
        }
    }

    public function login(): string
    {
        $this->connection->begin_transaction();
        try {
            $query = "SELECT * FROM user WHERE username=? AND password=?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("ss", $this->username, $this->password);
            $stmt->execute();
            $result = $stmt->get_result();
            $this->connection->commit();
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
        } catch (\mysqli_sql_exception $exception) {
            $this->connection->rollback();
            return $exception;
        }
    }

    public function change_credentials()
    {
        $update = null;
        $new_pass = null;

        //se è impostata la nuova password quella vecchia viene sostituita
        if (!empty($_POST['new_pwd'])) {
            $old_pwd = $_POST['old_pwd'];
            $old_pass = hash("sha512", ($old_pwd));
            $this->connection->commit();
            try {
                $query = "SELECT * from user WHERE id_utente = ?";
                $stmt = $this->connection->prepare($query);
                $stmt->bind_param("i", $this->id);
                $stmt->execute();
                $result = $stmt->get_result();
                $this->connection->commit();
            } catch (\mysqli_sql_exception $exception) {
                $this->connection->rollback();
            }
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_array();
                if ($old_pass == $row['password']) {
                    $new_pass = hash("sha512", ($_POST['new_pwd']));
                    try {
                        $update = "UPDATE user SET mail=?, username=?, password=? WHERE id_utente=?";
                        $stmt = $this->connection->prepare($update);
                        $stmt->bind_param("sssi", $this->mail, $this->username, $new_pass, $this->id);
                        $stmt->execute();
                        $this->connection->commit();
                    } catch (\mysqli_sql_exception $exception) {
                        $this->connection->rollback();
                    }
                    session_destroy();
                    return 'credenziali cambiate';

                } else {
                    return 'credenziali errate';
                }
            } else {
                return 'utente non trovato';
            }


        } else { //se non è impostata la nuova password quela vecchia rimane uguale
            $this->connection->begin_transaction();
            try {
                $update = "UPDATE user SET mail=?, username=? WHERE id_utente=?";
                $stmt = $this->connection->prepare($update);
                $stmt->bind_param("ssi", $this->mail, $this->username,$this->id);
                $stmt->execute();
                $this->connection->commit();
                session_destroy();
                return 'credenziali cambiate';
            } catch (\mysqli_sql_exception $exception) {
                $this->connection->rollback();
            }
        }

        
       
    }

    public function logout(): bool
    {
        session_destroy();
        return true;
    }


}

?>