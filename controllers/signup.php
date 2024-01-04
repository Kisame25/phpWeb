<?php
    require './database/db.php';
    require './config.php';
    $message = '';
    if(isset($_POST['email'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['re-password'])){
        if($_POST['password'] === $_POST['re-password']){
            session_start();
            $usernam = $_POST['username'];
            $password = md5($_POST['password']);
            //$password = ($_POST['password']);
            $email = $_POST['email'];

            $insert = "INSERT INTO users (username,password,email,role,activation,create_at,update_at) VALUES  ('$usernam','$password','$email','user',1,CURDATE(),CURDATE())";
            $conn->query($insert);
            header("Location:http://".$host.":".$port."/login");
                    
        }else{
            $message = "Password and Re-password invalid";
        }
    }
    $conn->close();
    $title = "Signup page";
    require './views/signup.php';