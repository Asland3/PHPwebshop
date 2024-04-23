<?php
require_once "includes/config_session.inc.php";
require_once "includes/products/productsController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h3>
        <?php
        if (isset($_SESSION['user_id'])) {
            echo "You are logged in as " . $_SESSION['user_name'];
        } else {
            echo "You are not logged in";
        }
        ?>
    </h3>

    <?php
    if (!isset($_SESSION['user_id'])) { ?>
        <a href="login.php"><button>Login</button></a>
        <a href="signup.php"><button>Signup</button></a>
    <?php } else { ?>
        <form action="includes/logout.inc.php" method="post">
            <button type="submit">Logout</button>
        </form>
    <?php }
    ?>

    <!-- Include the products view here -->
    <?php include "includes/products/productsView.php"; ?>

</body>

</html>