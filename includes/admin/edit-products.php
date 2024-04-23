<?php
require_once "../dbh.inc.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Check if file was uploaded
    if (!empty($_FILES['image']['name'])) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // If no file was uploaded, get the current image path from the database
        $query = "SELECT image FROM products WHERE id = :id;";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $target_file = $result['image'];
    }

    $query = "UPDATE products SET name = :name, image = :image, price = :price, description = :description WHERE id = :id;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":id", $id);
    $statement->bindParam(":name", $name);
    $statement->bindParam(":image", $target_file);
    $statement->bindParam(":price", $price);
    $statement->bindParam(":description", $description);
    $statement->execute();

    header('Location: ../../admin.php');
}
