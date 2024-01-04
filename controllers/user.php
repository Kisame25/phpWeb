<?php
    require './database/db.php';
    require './config.php';
    $title = "Profile page";
    // Start the session
    session_start();
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }
    //Unauthorized vulnerbility

    // to fix this vulnerbility
    
    /* if($id !== $_GET['id']){
        abort(401,"Error: 401 - Unauthorized","Unauthorized");
    } */

    $message = "";
    //die($_SESSION['id']);
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $sql = "SELECT * FROM users WHERE id = {$_GET['id']}";
        $result = $conn->query($sql);
        if($result->num_rows != 0){
            $user = $result->fetch_assoc();
            require './views/user.php';
        }else{
            abort(404);
        }
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $httpMethod = isset($_POST['_method']) ? strtoupper($_POST['_method']) : '';
        $sql = "SELECT * FROM users WHERE id = {$_GET['id']}";
        $result = $conn->query($sql);
        if($result->num_rows === 0){
            abort(404);
        }
        $user = $result->fetch_assoc();
        $password = md5($_POST['password']);
        $new_password = md5($_POST['new-password']);
        if ($httpMethod === 'PUT') {
            if($password == $user['password']){
                $sql = "SELECT id FROM users WHERE id = {$_GET['id']}";
                if($conn->query($sql)->num_rows === 0){
                    abort(404);
                }
                $sql = "UPDATE users SET username = '{$_POST['username']}',password = '$new_password', email = '{$_POST['email']}' WHERE id = {$_GET['id']}";
                $conn->query($sql);
                // Unset all session variables
                session_unset();
                // Destroy the session
                session_destroy();
                header("Location:http://".$host.":".$port."/login");
            }else{

                $message = "Invalid password.";
                require './views/user.php';
            }  
        }
    }
    $conn->close();
      
    

