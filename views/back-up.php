<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">WEB-PHP</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ps-1">
                    <a class="nav-link hover-nav" href="/administrator/users">Dash Board</a>
                </li>
                <li class="nav-item ps-1">
                    <a class="nav-link  active-nav" href="/administrator/back-up/users">Back-Up</a>
                </li>
            </ul>
        </div>
        <div class="d-flex m-2">
            <a type="button" href="/administrator/orders" class="btn btn-primary position-relative">
                Orders
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        99+
                    <span class="visually-hidden">unread messages</span>
                </span>
            </a>
        </div>
    </nav>
    <main class="container-fluid" >
        <div class="row p-2 rounded shadow ">
            <h3 class="fw-bold mb-4">Dashboard</h3>
            <div class="col-3 border-end h-30">
                <div class="sidebar rounded">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= IsUrl('/administrator/back-up/users')? 'active-bar':'hover-bar'?> fs-5" href="/administrator/back-up/users">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= IsUrl('/administrator/back-up/products')? 'active-bar':'hover-bar'?> fs-5" href="/administrator/back-up/products">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= IsUrl('/administrator/back-up/orders-cancel')? 'active-bar':'hover-bar'?> fs-5" href="/administrator/back-up/orders-cancel">Orders</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-8 border-start overflow-auto w-75 h-30" >
                <?php
                $url = parse_url($_SERVER['REQUEST_URI'])['path'];
                switch($url){
                    case "/administrator/back-up/users":
                        require 'views/admin/user.delete.php';
                    break;
                    case "/administrator/back-up/products":
                        require 'views/admin/product.delete.php';
                    break;
                    case "/administrator/back-up/products-delete":
                        require 'views/admin/product.delete.php';
                        break;
                    case "/administrator/back-up/orders-cancel":
                        require 'views/admin/order.cancel.php';
                        break;
                    default:
                        abort(404);
                }
                ?>
            </div>
        </div>
    </main>