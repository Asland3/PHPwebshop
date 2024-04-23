<?php
require_once "includes/config_session.inc.php";
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

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Webshop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <?php
                    if (!isset($_SESSION['user_id'])) { ?>
                        <a class="nav-link" href="login.php">Login</a>
                        <a class="nav-link" href="signup.php">Signup</a>
                    <?php } else { ?>
                        <span class="nav-link">Logged in as <?php echo $_SESSION['user_name']; ?></span>
                        <a class="nav-link" href="cart.php">Cart</a> <!-- Add this line -->
                        <a class="nav-link" href="admin.php">Admin Page</a>
                        <form class="d-flex" action="includes/logout.inc.php" method="post">
                            <button class="btn btn-outline-success" type="submit">Logout</button>
                        </form>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </nav>


</body>

</html>