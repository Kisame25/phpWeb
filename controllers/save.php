<?php 
    require './database/db.php';
    require './config.php';
    $sql = "SELECT id FROM orders WHERE id = {$_GET['id']}; ";
    if($conn->query($sql)->num_rows === 0){
        abort(404);
    }
    $sql = "DELETE FROM orders WHERE id = {$_GET['id']};";
    $conn->query($sql);
    header("Location: http://".$host.":".$port."/");
    $conn->close();
    

    