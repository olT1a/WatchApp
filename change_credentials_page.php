<?php 
session_start(); 
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WatchApp</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
    <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Change credentials</h2><br>

                <form method="POST" action="change_credentials.php">

                <div class="form-outline form-white mb-4">
                    <label>Mail</label>
                    <input type="mail" name="mail" id="typeEmailX" placeholder="mail" class="form-control form-control-lg" value="<?php echo $_SESSION['mail'] ?>"/><br>
                </div>

                <div class="form-outline form-white mb-4">
                    <label>Username</label>
                    <input type="text" name="user" id="typeEmailX" placeholder="username" class="form-control form-control-lg" value="<?php echo $_SESSION['username'] ?>"/><br>
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="password" name="pwd" id="typePasswordX" placeholder=" old password" class="form-control form-control-lg"/><br>
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="password" name="pwd" id="typePasswordX" placeholder="new password" class="form-control form-control-lg"/><br>
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Change</button>
                
                </form>
                
                </div>

            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>