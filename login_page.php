<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body class="bg-dark p-2 text-dark bg-opacity-25">
    <div class="border border-primary p-2 mb-2 rounded position-absolute top-50 start-50 border-2 translate-middle bg-body-secondary">
        <h1 class="text-center">Login</h1>
            <form method="POST" action="./login.php">
                <input name="user" type="text" placeholder="Username" class="rounded position-absolute"><br><br>
                <input name="pwd" type="password" placeholder="Password" class="rounded position-absolute"><br><br>
                <input type="submit" value="login" class="container text-center btn btn-primary"><br><br>    
            </form>
        <a href="registration_page.php">Non sei registrato? Registrati</a><br>
        <a href="index.php">Torna alla home</a>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    </body>
</html>