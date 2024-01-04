<?php
// MySQL server credentials
$servername = "localhost";
$username = "root";
$password = "";

// Create a connection
$conn = new mysqli($servername, $username, $password);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query('USE phpweb');


$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    password VARCHAR(255),
    email VARCHAR(50),
    role VARCHAR(50),
    activation BOOL,
    create_at DATE,
    update_at DATE
);";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
    exit();
}

$checkEmptyQuery = "SELECT * FROM users";
$result = $conn->query($checkEmptyQuery);


$admin_pass = md5('password');
$jonh_pass = md5('keynotfound');
$baplo_pass = md5('secret');

if ($result->num_rows === 0) {
    $insert = "INSERT INTO users (username,password,email,role,activation,create_at,update_at) VALUES  ('admin','$admin_pass','admin@gmail.com','admin',1,CURDATE(),CURDATE()),('jonh','$jonh_pass','jonh@gmail.com','user',1,CURDATE(),CURDATE()),('baplo','$baplo_pass','baplo@gmail.com','user',1,CURDATE(),CURDATE());";
    if ($conn->query($insert) !== TRUE) {
        echo "Error inserting data: " . $conn->error;
    }
}

$products = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(30),
    product_image VARCHAR(255),
    description VARCHAR(255),
    price FLOAT(8,2),
    user_id INT,
    create_at DATE,
    update_at DATE,
    activation BOOL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);";
if ($conn->query($products) !== TRUE) {
    echo "Error creating table: " . $conn->error;
    exit();
}

$checkEmptyProducts = $conn->query("SELECT * FROM products");

if ($checkEmptyProducts->num_rows === 0) {
    $insert = "INSERT INTO products (product_name,product_image,description,price,user_id,create_at,update_at,activation) 
    VALUES  
    ('Apple juice','images/apple-juice.jpg','apple-juice',2.00,1,CURDATE(),CURDATE(),1),
    ('Lemon juice','images/lemon-juice.jpg','lemon-juice',1.50,2,CURDATE(),CURDATE(),1),
    ('Peer juice','images/peer-juice.jpg','peer-juice',2.00,2,CURDATE(),CURDATE(),1),
    ('Pomegranate juice','images/pomegranate-juice.jpg','pomegranate-juice',3.00,3,CURDATE(),CURDATE(),1),
    ('Strawberry juice','images/strawberry-juice.jpg','strawberry-juice',1.50,3,CURDATE(),CURDATE(),1);";
    if ($conn->query($insert) !== TRUE) {
        echo "Error inserting data: " . $conn->error;
    }
}

$orders = "CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(30),
    product_image VARCHAR(255),
    description VARCHAR(255),
    price FLOAT(8,2),
    n_orders INT,
    totale FLOAT(8,2),
    product_id INT,
    user_id INT,
    email VARCHAR(255),
    address VARCHAR(255),
    order_date DATE,
    create_at DATE,
    update_at DATE,
    accept BOOL,
    activation BOOL,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);";

if ($conn->query($orders) !== TRUE) {
    echo "Error creating table: " . $conn->error;
    exit();
}

$checkEmptyOrders = $conn->query("SELECT * FROM orders");
if($checkEmptyOrders->num_rows === 0){
    $insert = "INSERT INTO orders (product_name,product_image,description,price,n_orders,totale,product_id,user_id,email,address,order_date,create_at,update_at,accept,activation)
                VALUES
                ('Apple juice','images/apple-juice.jpg','apple-juice',2.00,2,4.00,1,2,'jonh@gmail.com','phnom penh',CURDATE(),CURDATE(),CURDATE(),0,1),
                ('Strawberry juice','images/strawberry-juice.jpg','strawberry-juice',1.50,2,3.00,5,3,'paplo@gmail.com','phnom penh',CURDATE(),CURDATE(),CURDATE(),0,1)
    ";
    if ($conn->query($insert) !== TRUE) {
        echo "Error inserting data: " . $conn->error;
    }
} 



?>