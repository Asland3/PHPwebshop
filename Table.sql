CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user'
);


CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);







CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE subcategories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);




CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    subcategory_id INT,
    FOREIGN KEY (subcategory_id) REFERENCES subcategories(id)
);





SELECT c.name as category, s.name as subcategory, p.name as product
FROM products p
JOIN subcategories s ON p.subcategory_id = s.id
JOIN categories c ON s.category_id = c.id;



-- Inserting categories
INSERT INTO categories (name) VALUES ('Fruits'), ('Vegetables');

-- Inserting subcategories
INSERT INTO subcategories (name, category_id) VALUES ('Citrus', 1), ('Berries', 1), ('Root', 2), ('Leafy green', 2);

-- Inserting products
INSERT INTO products (name, description, image, price, subcategory_id) VALUES 
('Orange', 'Fresh oranges', 'orange.jpg', 0.50, 1),
('Lemon', 'Sour lemons', 'lemon.jpg', 0.30, 1),
('Strawberry', 'Sweet strawberries', 'strawberry.jpg', 0.70, 2),
('Blueberry', 'Delicious blueberries', 'blueberry.jpg', 0.80, 2),
('Carrot', 'Crunchy carrots', 'carrot.jpg', 0.40, 3),
('Potato', 'Versatile potatoes', 'potato.jpg', 0.20, 3),
('Spinach', 'Healthy spinach', 'spinach.jpg', 1.00, 4),
('Lettuce', 'Crisp lettuce', 'lettuce.jpg', 0.90, 4);










INSERT INTO products (name, description, image, price) VALUES ('Product 1', 'test1' 'images/product1.jpg', 99.99);
INSERT INTO products (name, description, image, price) VALUES ('Product 2', 'test2' 'images/product2.jpg', 89.99);
INSERT INTO products (name, description, image, price) VALUES ('Product 3', 'test3' 'images/product3.jpg', 79.99);

