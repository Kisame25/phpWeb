<?php 
    require './database/db.php';
    $title = "Orders page";

    session_start();
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }
    //Unauthorized vulnerbility

    // to fix this vulnerbility
    /* if($id !== $_GET['id']){
        abort(401,"Error: 401 - Unauthorized","Unauthorized");
    } */

    $sql = "SELECT * FROM orders WHERE user_id = {$_GET['id']} AND activation = 1;";
    $result = $conn->query($sql);
    $orders = [];
    if($result->num_rows != 0){
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    }else{
        $message = 'No order yet.';
    }
    
    require './views/order.php';
?>