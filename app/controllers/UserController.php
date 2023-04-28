<?php

namespace App\controllers;

use App\models\UserModel;

class UserController
{
    private UserModel $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function loginHandler()
    {
        $response = $this->userModel->login();
        switch($response)
        {
            case 'OK':
                header("location:home");
                break;

            case 'credenziali errate':
                header("location:login");
                break;

            case 'problema':
                echo 'non è stato possibile effettuare il login';   //la query non viene eseguita

        }
       
    }

    public function signUpHandler()
    {
        $response = $this->userModel->addUser();

        switch($response)
        {
            case 'ADDED':
                header("location:login");
                break;
            
            case 'ERROR':
                header("location: signUp");
                break;
        }
    }

    public function change_credentialsHandler()
    {
        checkId();
        $response = $this->userModel->change_credentials();

        switch($response)
        {
            case 'credenziali cambiate':
                header("location:login");
                break;

            case 'credenziali errate':
                header("location: change_credentials");
                break;

            case 'problema':
                echo 'non è stato possibile cambiare le credenziali';
                header("location: change_credenziali");
                break;

            case 'utente non trovato':
                echo 'utente non trovato';
                header("location: login");
                break;
        }
    }

    public function LogoutHandler()
    {
        checkId();
        $response = $this->userModel->change_credentials();
        switch($response)
        {
            case true:
                header("Location:home");
        }

    }

}



?>