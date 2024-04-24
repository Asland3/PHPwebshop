<?php
function getProductsByCategoryAndSubcategory($pdo, $category, $subcategory)
{
    $sql = "SELECT p.* FROM products p
            JOIN subcategories s ON p.subcategory_id = s.id
            JOIN categories c ON s.category_id = c.id
            WHERE c.name = :category AND s.name = :subcategory";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['category' => $category, 'subcategory' => $subcategory]);
    return $stmt->fetchAll();
}

function getAllProducts($pdo)
{
    $query = "SELECT * FROM products";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
