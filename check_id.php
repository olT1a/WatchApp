<?php
session_start();
if (!isset($_SESSION['id_utente'])) {
    header("location:login_page.php");
}
?>