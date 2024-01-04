<?php 
session_start();
require './database/db.php';
$title = "admin dashboard";
require './config.php';
if(!(isset($_SESSION['admin']) && $_SESSION['admin'])){
    abort(401,"Error: 401 - Unauthorized",'Unauthorized');
}
$url = parse_url($_SERVER['REQUEST_URI'])['path'];

switch($url){
    case "/administrator/back-up/users":
        if(isset($_GET['id'])){
            $sql = "SELECT id FROM users WHERE WHERE id = {$_GET['id']};";
            if($conn->query($sql)->num_rows === 0){
                abort(404);
            }

            $sql = "UPDATE users SET activation = 1 WHERE id = {$_GET['id']};";
            $conn->query($sql);

            header("Location: http://".$host.":".$port."/administrator/back-up/users");
        }else{
            $sql = "SELECT id,username,email FROM users WHERE activation = 0 AND role != 'admin'";
            $result = $conn->query($sql);
            $resultData = [];
    
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $resultData[] = $row;
                }
            }else{
                $message = "No users in this table."; 
            }
        }
        $title = 'Back-up Users Dashboard';
        require './views/back-up.php';
        break;
    case "/administrator/back-up/products":
        if(isset($_GET['id'])){
            $sql = "SELECT id FROM products WHERE id = {$_GET['id']};";
            if($conn->query($sql)->num_rows === 0){
                abort(404);
            }
            $sql = "UPDATE products SET activation = 1 WHERE id = {$_GET['id']};";
            $conn->query($sql);
            //redirect to page to restor data
            header("Location: http://".$host.":".$port."/administrator/back-up/products");
        }else{
            $sql = "SELECT * FROM products WHERE activation = 0";
            $result = $conn->query($sql);
            $resultData = [];
    
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $resultData[] = $row;
                }
            }else{
                $message = "No Products in this table."; 
            }
        }
        $title = 'Products Dashboard';
        require './views/back-up.php';
        break;
    case "/administrator/back-up/products-delete":
        if (isset($_GET['id'])){
            $sql = "SELECT * FROM products WHERE id = {$_GET['id']};";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $sql = "DELETE FROM products WHERE id = {$_GET['id']};";
                $conn->query($sql);
                header("Location:http://".$host.":".$port."/administrator/back-up/products");
            }else{
                abort(404);
            }
        }
        $title = 'Update Products';
        require './views/back-up.php';
        break;
    case "/administrator/back-up/orders-cancel":
        if(isset($_GET['id'])){

            $sql = "SELECT * FROM orders WHERE id = {$_GET['id']};";
            if($conn->query($sql)->num_rows === 0){
                abort(404);
            }
            $sql = "UPDATE orders SET accept = 1, activation = 1 WHERE id = {$_GET['id']};";
            $conn->query($sql);
            //redirect to page to restor data
            header("Location: http://".$host.":".$port."/administrator/back-up/orders-cancel");
        }else{
            $sql = "SELECT * FROM orders WHERE accept = 0";
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
        require './views/back-up.php';
        break;
    case "/administrator/back-up/orders-delete":
        if(isset($_GET['id'])){
            $sql = "SELECT * FROM orders WHERE id = {$_GET['id']};";
            if($conn->query($sql)->num_rows === 0){
                abort(404);
            }
            $sql = "DELETE FROM orders WHERE id = {$_GET['id']};";
            $conn->query($sql);
            //redirect to page to restor data
            header("Location: http://".$host.":".$port."/administrator/back-up/orders-cancel");
        }
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
    

