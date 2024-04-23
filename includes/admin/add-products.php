<?php
require_once "../dbh.inc.php";

$name = $_POST['name'];
$image = $_FILES['image']['name'];
$price = $_POST['price'];
$description = $_POST['description'];

$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

$query = "INSERT INTO products (name, image, price, description) VALUES (:name, :image, :price, :description);";
$statement = $pdo->prepare($query);
$statement->bindParam(":name", $name);
$statement->bindParam(":image", $target_file);
$statement->bindParam(":price", $price);
$statement->bindParam(":description", $description);
$statement->execute();

header('Location: ../../admin.php');
