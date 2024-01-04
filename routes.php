<?php


    $url = parse_url($_SERVER['REQUEST_URI'])['path'];
    $route = [
        '/' => 'controllers/index.php',
        '/login' => 'controllers/login.php',
        '/signup' => 'controllers/signup.php',
        '/about' => 'controllers/about.php',
        '/contact' => 'controllers/contact.php',
        '/support' => 'controllers/support.php',
        '/product' => 'controllers/buy.php',
        '/secret-page' => 'controllers/secret-page.php',
        '/user' => 'controllers/user.php',
        '/order' => 'controllers/order.php',
        '/cancel' => 'controllers/save.php',
        '/logout' => 'controllers/logout.php',
        '/administrator' => 'controllers/admin.php',
        '/administrator/users' => 'controllers/admin.php',
        '/administrator/products' => 'controllers/admin.php',
        '/administrator/products-update' => 'controllers/admin.php',
        '/administrator/products-add' => 'controllers/admin.php',
        '/administrator/orders' => 'controllers/admin.php',
        '/administrator/orders-accepted' => 'controllers/admin.php',
        '/administrator/orders-cancel' => 'controllers/admin.php',
        '/administrator/back-up/users' => 'controllers/back-up.php',
        '/administrator/back-up/products' => 'controllers/back-up.php',
        '/administrator/back-up/products-delete' => 'controllers/back-up.php',
        '/administrator/back-up/orders-cancel' => 'controllers/back-up.php',
        
    ];

    function abort($code = 404,$message = 'Sorry Page Not Found.',$titme_message="Not Found"){
        http_response_code($code);
        $title = "$code-$titme_message";
        require './views/404.php';
        exit();
    }

    function IsRoute($url,$route){
        if(array_key_exists($url, $route)){
            require $route[$url];
        }else{
            abort();
        }
    }

    IsRoute($url,$route);