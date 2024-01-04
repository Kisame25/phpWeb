<?php 
require './database/db.php';
require './config.php';
$title = "Orders";

if(!isset($_GET['id'])){
    abort(404);
}
$sql = "SELECT * FROM products WHERE id = {$_GET['id']} ;";
$result = $conn->query($sql);
if($result->num_rows != 0){
    $product = $result->fetch_assoc();
}else{
    abort(404);
}

if(isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['address'])&&isset($_POST['quantity'])&&isset($_POST['payment'])){
    $result = $conn->query("SELECT * FROM users WHERE username = '{$_POST['username']}'");
    if($result->num_rows != 0){
        $user = $result->fetch_assoc();
        if($user['id'] !== $_POST['user_id']){
            abort(404,'This user invalid.');
        }
    }else{
        abort(404,'This user invalid.');
    }
    $insert = "INSERT INTO orders (product_name,product_image,description,price,n_orders,totale,product_id,user_id,email,address,order_date,create_at,update_at,accept,activation)
                VALUES
                ('{$product['product_name']}','{$product['product_image']}','{$product['description']}',{$product['price']},{$_POST['quantity']},{$product['price']}*{$_POST['quantity']},{$product['id']},{$user['id']},'{$user['email']}','{$_POST['address']}',CURDATE(),CURDATE(),CURDATE(),0,1);";
    if ($conn->query($insert) !== TRUE) {
        echo "Error inserting data: " . $conn->error;
    }
    header("Location:http://".$host.":".$port."/");

}
$conn->close();
require './views/buy.php';
    

