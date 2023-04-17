<?php
function checkId()
{
    if (!isset($_SESSION['id_utente']))
        header("location:login");
}

?>