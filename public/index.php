<?php
session_start();
$request = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_SPECIAL_CHARS);

switch ($request) {
    case 'home':
        require_once "../app/views/index_page.php";
        break;

    case 'login':
        require_once "../app/views/login_page.php";
        break;

    case 'signUp':
        require_once "../app/views/registration_page.php";
        break;

    case 'personal_area':
        require_once "../app/views/personal_area_page.php";
        break;

    case 'change_credentials':
        require_once "../app/views/change_credentials_page.php";
        break;

    case 'buy':
        require_once "../app/views/buyer_page.php";
        break;

    case 'sell':
        require_once "../app/views/seller_page.php";
        break;

    case 'loginHandler':
        require_once "../app/formHandler/login.php";
        break;

    case 'signUpHandler':
        require_once "../app/formHandler/registration.php";
        break;

    case 'change_credentialsHandler':
        require_once "../app/formHandler/change_credentials.php";
        break;

    case 'LogoutHandler':
        require_once "../app/formHandler/logout.php";
        break;

    case 'RegistrationHandler':
        require_once "../app/formHandler/registration.php";
        break;

    default:
        //http_response_code(404);
        //require_once "../app/views/404.php";
        //eliminare 404.php
        require_once "../app/views/index_page.php";
        break;
}