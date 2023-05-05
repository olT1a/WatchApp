<?php

use App\controllers\SiteController;
use App\controllers\UserController;

session_start();
require_once '../vendor/autoload.php';
$request = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_SPECIAL_CHARS);
$siteController = new SiteController();
$userController = new UserController();

switch ($request) {
    case 'home':
        $siteController->home();
        break;

    case 'login':
        $siteController->login();
        break;

    case 'signUp':
        $siteController->SignUp();
        break;

    case 'personal_area':
        $siteController->personal_area();
        break;

    case 'change_credentials':
        $siteController->change_credentials();
        break;

    case 'buy':
        $siteController->buy();
        break;

    case 'sell':
        $siteController->sell();
        break;

    case 'loginHandler':
        $userController->loginHandler();
        break;

    case 'signUpHandler':
        $userController->signUpHandler();
        break;

    case 'change_credentialsHandler':
        $userController->change_credentials();
        break;

    case 'LogoutHandler':
        $userController->LogoutHandler();
        break;

    case 'RegistrationHandler':
        $userController->signUpHandler();
        break;

    default:
        //http_response_code(404);
        //require_once "../app/views/404.php";
        //eliminare 404.php
        $siteController->home();
        break;
}