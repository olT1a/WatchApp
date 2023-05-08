<?php

use App\controllers\SiteController;
use App\controllers\UserController;
use App\controllers\WatchController;

session_start();
require_once '../vendor/autoload.php';
$request = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_SPECIAL_CHARS);
$siteController = new SiteController();
$userController = new UserController();
$watchController = new WatchController();

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

    case 'brandHandler':
        $watchController->brandHandler();
        break;

    case 'modelHandler':
        $watchController->modelHandler();
        break;
        
    default:
        $siteController->notFound();
        break;
}