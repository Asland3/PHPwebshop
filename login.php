<?php
require_once "includes/config_session.inc.php";
require_once "includes/signup/signup_view.inc.php";
require_once "includes/login/login_view.inc.php";
require_once "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if (!isset($_SESSION['user_id'])) { ?>
                    <h1 class="text-center">Login</h1>
                    <form action="includes/login/login.inc.php" method="post" class="p-5 border rounded-3">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                <?php }
                ?>

                <div class="text-center mt-3">
                    <a href="index.php" class="btn btn-secondary">Abort</a>
                </div>

                <?php
                checkLoginErrors();
                ?>
            </div>
        </div>
    </div>

</body>

</html>