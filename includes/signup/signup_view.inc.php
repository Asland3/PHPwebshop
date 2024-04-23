<?php

declare(strict_types=1);

function signupInput()
{
    if (isset($_SESSION["signupData"]["email"]) && !isset($_SESSION["errors_signup"]["emailTaken"]) && !isset($_SESSION["errors_signup"]["invalidEmail"])) {
        echo '<div class="mb-3">';
        echo '<label for="email" class="form-label">Email</label>';
        echo '<input type="text" name="email" id="email" class="form-control" value="' . $_SESSION["signupData"]["email"] . '">';
        echo '</div>';
    } else {
        echo '<div class="mb-3">';
        echo '<label for="email" class="form-label">Email</label>';
        echo '<input type="text" name="email" id="email" class="form-control">';
        echo '</div>';
    }

    echo '<div class="mb-3">';
    echo '<label for="password" class="form-label">Password</label>';
    echo '<input type="password" name="password" id="password" class="form-control">';
    echo '</div>';

    if (isset($_SESSION["signupData"]["name"]) && !isset($_SESSION["errors_signup"]["invalidName"])) {
        echo '<div class="mb-3">';
        echo '<label for="name" class="form-label">Name</label>';
        echo '<input type="text" name="name" id="name" class="form-control" value="' . $_SESSION["signupData"]["name"] . '">';
        echo '</div>';
    } else {
        echo '<div class="mb-3">';
        echo '<label for="name" class="form-label">Name</label>';
        echo '<input type="text" name="name" id="name" class="form-control">';
        echo '</div>';
    }

    if (isset($_SESSION["signupData"]["phone"]) && !isset($_SESSION["errors_signup"]["invalidPhone"])) {
        echo '<div class="mb-3">';
        echo '<label for="phone" class="form-label">Phone</label>';
        echo '<input type="text" name="phone" id="phone" class="form-control" value="' . $_SESSION["signupData"]["phone"] . '">';
        echo '</div>';
    } else {
        echo '<div class="mb-3">';
        echo '<label for="phone" class="form-label">Phone</label>';
        echo '<input type="text" name="phone" id="phone" class="form-control">';
        echo '</div>';
    }

    if (isset($_SESSION["signupData"]["address"]) && !isset($_SESSION["errors_signup"]["invalidAddress"])) {
        echo '<div class="mb-3">';
        echo '<label for="address" class="form-label">Address</label>';
        echo '<input type="text" name="address" id="address" class="form-control" value="' . $_SESSION["signupData"]["address"] . '">';
        echo '</div>';
    } else {
        echo '<div class="mb-3">';
        echo '<label for="address" class="form-label">Address</label>';
        echo '<input type="text" name="address" id="address" class="form-control">';
        echo '</div>';
    }
}


function checkSignupErrors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<p class='error'>" . $error . "</p>";
        }

        unset($_SESSION['errors_signup']);
    } elseif (isset($_GET['signup']) && $_GET['signup'] == 'success') {
        echo '<br>';
        echo '<p>Signup success!</p>';
    }
}
