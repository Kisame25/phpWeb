<?php
    require './database/db.php';
    require './config.php';
    session_start();
    $isMessage= '';
    if(isset($_POST['username']) && isset($_POST['password'])){
        $usernam = $_POST['username'];
        $password = md5($_POST['password']);

        // injection sql 
        // before fix code
        $usernam = str_replace(";", "#", $usernam);

        // to fix this code
        //$usernam = str_replace("'", "", $usernam);
        
        
        $sql = "SELECT * FROM users WHERE username = '{$usernam}' AND password = '{$password}';";

        $result = $conn->query($sql);
        
        if ($result->num_rows > 0){
            $_SESSION['logged_in'] = true;
            $user = $result->fetch_assoc();
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
           
            if($user['role'] === 'admin'){
                $_SESSION['admin'] = true;
            }
            header("Location: http://".$host.":".$port."/");
            
        } else {
            $isMessage = "username and password invalid";
        }
    }
    $conn->close();
    $title = "Login page";
    require './views/login.php';