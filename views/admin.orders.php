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
                <thead class="sticky-top">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Price</th>
                    <th scope="col">Orders</th>
                    <th scope="col">Totale</th>
                    <th scope="col">Email Order</th>
                    <th scope="col">Address</th>
                    <th scope="col">Order date</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>
                <?php foreach ($resultData as $order): ?>
                    <tr>
                        <th scope="row"><?= $order['id'] ?></td>
                        <td><?= $order['product_name'] ?></td>
                        <td>
                            <img src="/<?= $order['product_image']?>" alt="<?= $order['product_image'] ?>" width="40px">  
                        </td>
                        <td><?= $order['price'] ?></td>
                        <td><?= $order['n_orders'] ?></td>
                        <td><?= $order['totale'] ?></td>
                        <td><?= $order['email'] ?></td>
                        <td><?= $order['address'] ?></td>
                        <td><?= $order['order_date'] ?></td>
                        <td>
                            <a class="btn btn-success" href="/administrator/orders-accepted?id=<?= $order['id'] ?>">Accept</a>
                            <a class="btn btn-danger" href="/administrator/orders-cancel?id=<?= $order['id'] ?>" >Cancel</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
            <?php endif; ?>
        </div>
    </main>
<?php require 'components/script.php'?>




