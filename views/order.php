<?php require 'components/Header.php' ?>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">WEB-PHP</a>
        </div>
    </nav>
    <main class="mt-4">
        <div class="container">
            <?php if (isset($message)): ?>
                <h4 class="mt-5 text-center fw-bold"><?= $message ?></h4>    
            <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Product name</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Orders</th>
                            <th scope="col">Price</th>
                            <th scope="col">Totale Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Order date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td scope="row"><?= $order['id']?></td>
                                <td scope="col"><?= $order['product_name']?></td>
                                <td scope="col">
                                    <img src="<?= $order['product_image']?>" alt="" width="40px" height="40px">
                                        
                                </td>
                                <td scope="col"><?= $order['price']?></td>
                                <td scope="col"><?= $order['n_orders']?></td>
                                <td scope="col"><?= $order['totale']?></td>
                                <td scope="col"><?= $order['description']?></td>
                                <td scope="col"><?= $order['order_date'] ?></td>
                                <td scope="col">
                                    <a class="btn btn-danger" href="/cancel?id=<?= $order['id']?>">Cancel</a>
                                </td>
                            </tr>    
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </main>
<?php require 'components/script.php'?>