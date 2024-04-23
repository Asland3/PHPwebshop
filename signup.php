<?php
require_once "includes/config_session.inc.php";
require_once "includes/signup/signup_view.inc.php";
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
                <h1 class="text-center">Signup</h1>
                <form action="includes/signup/signup.inc.php" method="post" class="p-5 border rounded-3">
                    <?php
                    signupInput();
                    ?>
                    <button type="submit" class="btn btn-primary">Signup</button>
                </form>

                <?php
                checkSignupErrors();
                ?>

            </div>
        </div>
    </div>
    </div>

</body>

</html>