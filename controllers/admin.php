<?php
session_start();
require './database/db.php';
require './config.php';
$title = "admin dashboard";
if(!(isset($_SESSION['admin']) && $_SESSION['admin'])){
    abort(401,"Error: 401 - Unauthorized",'Unauthorized');
}
$url = parse_url($_SERVER['REQUEST_URI'])['path'];

switch($url){
    case "/administrator/users":
        if(isset($_GET['id'])){
            $sql = "SELECT id FROM users WHERE id = {$_GET['id']};";
            if($conn->query($sql)->num_rows === 0){
                abort(404);
            }
            $sql = "UPDATE users SET activation = 0 WHERE id = {$_GET['id']};";
            $conn->query($sql);
            //redirect to page to restor data
            header("Location: http://".$host.":".$port."/administrator/users");
        }else{
            $sql = "SELECT id,username,email FROM users WHERE activation = 1 AND role != 'admin'";
            $result = $conn->query($sql);
            $resultData = [];
    
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $resultData[] = $row;
                }
                $title = "Home page";
            }else{
                $message = "No users in this table."; 
            }
        }
        $title = 'Users Dashboard';
        require './views/admin.php';
        break;

    case "/administrator/products":
        if(isset($_GET['id'])){
            $sql = "SELECT id FROM products WHERE id = {$_GET['id']};";
            if($conn->query($sql)->num_rows === 0){
                abort(404);
            }
            $sql = "UPDATE products SET activation = 0 WHERE id = {$_GET['id']};";
            $conn->query($sql);
            //redirect to page to restor data
            header("Location: http://".$host.":".$port."/administrator/products");
        }else{
            $sql = "SELECT * FROM products WHERE activation = 1";
            $result = $conn->query($sql);
            $resultData = [];
    
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $resultData[] = $row;
                }
                $title = "Home page";
            }else{
                $message = "No users in this table."; 
            }
        }
        $title = 'Products Dashboard';
        require './views/admin.php';
        break;
    case "/administrator/products-update":
        if (isset($_GET['id'])) {
            $sql = " SELECT * FROM products WHERE id = {$_GET['id']};";
            $result = $conn->query($sql);
            if($result->num_rows === 0){
                abort(404);
            }
            $product = $result->fetch_assoc();
        }

        if(isset($_POST['product_name']) && isset($_POST['photo']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['activation'])){
            $sql = "SELECT id FROM products WHERE id = {$_GET['id']};";
            if($conn->query($sql)->num_rows === 0){
                abort(404);
            }
            $sql = "UPDATE products SET product_name = '{$_POST['product_name']}', product_image = 'images/{$_POST['photo']}', description = '{$_POST['description']}', price = {$_POST['price']}, update_at = CURDATE(), activation = {$_POST['activation']} WHERE id = {$_GET['id']};";
            $conn->query($sql);
            header("Location: http://".$host.":".$port."/administrator/products");
        }
        $title = 'Update Products';
        require './views/admin.php';
        break;
    case "/administrator/products-add":
        if(isset($_POST['product_name']) && isset($_POST['photo']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['activation'])){
            $insert = "INSERT INTO products (product_name,product_image,description,price,user_id,create_at,update_at,activation) 
            VALUES  
            ('{$_POST['product_name']}','images/{$_POST['photo']}','{$_POST['description']}',{$_POST['price']},1,CURDATE(),CURDATE(),{$_POST['activation']})";
            if ($conn->query($insert) !== TRUE) {
                echo "Error inserting data: " . $conn->error;
            }
            header("Location: http://".$host.":".$port."/administrator/products");
        }
        $title = 'Add New Product';
        require './views/admin/product-add.php';
        break;
    case "/administrator/orders-accepted":
        if(isset($_GET['id'])){
            $sql = "SELECT id FROM orders  WHERE id = {$_GET['id']};";
            if($conn->query($sql)->num_rows === 0){
                abort(404);
            }
            $sql = "UPDATE orders SET accept = 1 WHERE id = {$_GET['id']};";
            $conn->query($sql);
            header("Location: http://".$host.":".$port."/administrator/orders");
        }else{
            $sql = "SELECT * FROM orders WHERE activation = 1 AND accept = 1";
            $result = $conn->query($sql);
            $resultData = [];
    
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $resultData[] = $row;
                }
                $title = "Home page";
            }else{
                $message = "No Orders in this table."; 
            }
        }
        $title = 'Orders Dashboard';
        require './views/admin.php';
        break;

    case "/administrator/orders-cancel":
        if(isset($_GET['id'])){
            $sql = "SELECT id FROM orders WHERE id = {$_GET['id']};";
            if($conn->query($sql)->num_rows === 0){
                abort(404);
            }
            $sql = "UPDATE orders SET accept = 0, activation = 0 WHERE id = {$_GET['id']};";
            $conn->query($sql);
            //redirect to page to restor data
            header("Location: http://".$host.":".$port."/administrator/orders-cancel");
        }else{
            $sql = "SELECT * FROM orders WHERE activation = 1 AND accept = 1";
            $result = $conn->query($sql);
            $resultData = [];
        
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $resultData[] = $row;
                }
                $title = "Home page";
            }else{
                $message = "No Orders in this table."; 
            }
        }
        $title = 'Orders Dashboard';
        require './views/admin.php';
        break;
    case "/administrator/orders":
        if(isset($_GET['id'])){
            $sql = "SELECT id FROM orders WHERE id = {$_GET['id']};";
            if($conn->query($sql)->num_rows === 0){
                abort(404);
            }
            $sql = "UPDATE orders SET accept = 1 WHERE id = {$_GET['id']};";
            $conn->query($sql);
            //redirect to page to restor data
            header("Location: http://".$host.":".$port."/administrator/orders");
        }else{
            $sql = "SELECT * FROM orders WHERE activation = 1 AND accept = 0";
            $result = $conn->query($sql);
            $resultData = [];
        
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $resultData[] = $row;
                }
                $title = "Home page";
            }else{
                $message = "No Orders in this table."; 
            }
        }
        $title = 'Orders Dashboard';
        require './views/admin.orders.php';
        break;
    case "/administrator":
        $message = "";
        if(isset($_POST['key']) && isset($_POST['secret_key'])){
            if($_POST['secret_key'] !== $_POST['key']){
                $message = "Invalid key.Please try again.";
            }else{
                header("Location: http://".$host.":".$port."/administrator/users");   
            }
        }
        require './views/index.admin.php';
        break;
    default:
        abort(404);
}
$conn->close();
