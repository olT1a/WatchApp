<?php

namespace App\controllers;

class SiteController
{
    public function home()
    {
        require_once "../app/views/home_page.php";
    }

    public function login()
    {
        require_once "../app/views/login_page.php";
    }

    public function SignUp()
    {
        require_once "../app/views/registration_page.php";
    }

    public function personal_area()
    {
        require_once "../app/views/personal_area_page.php";
    }

    public function change_credentials()
    {
        require_once "../app/views/change_credentials_page.php"; 
    }

    public function buy()
    {
        require_once "../app/views/buyer_page.php";
    }

    public function sell()
    {
        require_once "../app/views/seller_page.php";
    }

    public function notFound()
    {
        require_once "../app/views/404.php";
    }

    public function notDisponible()
    {
        require_once "../app/views/notDisponible.php";
    }

    public function purchases()
    {
        require_once "../app/views/purchases_page.php";
    }

}
?>