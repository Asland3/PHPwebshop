<?php
require_once "includes/config_session.inc.php";
require_once "includes/signup/signup_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Signup</h1>

    <form action="includes/signup/signup.inc.php" method="post">
        <?php
        signupInput();
        ?>
        <button type="submit">Signup</button>
    </form>

    <?php
    checkSignupErrors();
    ?>

    <a href="index.php"><button>Abort</button></a>

</body>

</html>