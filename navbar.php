<?php
require_once "includes/config_session.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar {
            background-color: #333;
            overflow: hidden;
            position: fixed;
            top: 0;
            width: 100%;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <?php
        if (!isset($_SESSION['user_id'])) { ?>
            <a href="login.php">Login</a>
            <a href="signup.php">Signup</a>
        <?php } else { ?>
            <a href="#">Logged in as <?php echo $_SESSION['user_name']; ?></a>
            <p><?php echo $_SESSION['user_isAdmin']; ?></p>
            <form action="includes/logout.inc.php" method="post" style="float: right;">
                <button type="submit">Logout</button>
            </form>
        <?php }
        ?>
    </div>
</body>

</html>