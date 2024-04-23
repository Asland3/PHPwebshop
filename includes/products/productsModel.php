<?php
function getProducts($pdo)
{
    $query = "SELECT * FROM products";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
