<?php
require('../app/functions.php');
checkId();
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

</head>

<body>
    <center>
        <h1>Purchases</h1>
        <div class='container my-5 row' id="purchases">

        </div>
        <a href="home" class="btn btn-outline-dark btn-lg px-5">Torna alla home</a>
    </center>
    <script src='./js/purchasesHandler.js'></script>
</body>

</html>