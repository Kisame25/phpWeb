<?php require 'components/Header.php' ?>
<body>
    <?php require 'components/Nav.php'?>
    <main class="m-4 ">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h4 class="fw-bold">Shops List</h4>
                </div>
                <div class="col-6">
                    <form action="/" class="d-flex" role="search" method="GET">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>

            <div class="row mt-5">
                <?php if (isset($searchMessage)): ?>
                    <h4 class="mt-5 text-center fw-bold"><?= $searchMessage ?></h4>
                <?php else: ?>
                    <?php foreach ($resultData as $product): ?>

                        <div class="col-4 mt-3 ">
                        <div class="card" style="width: 18rem;">
                            <a href="/product?id=<?= $product['id'] ?>"><img src="<?= $product['product_image'] ?>" class="card-img-top" alt="..." style="height: 300px;"></a>
                            <div class="card-body">
                                <h5 class="card-title "><?= $product['product_name'] ?></h5>
                                <p class="card-text"><?= $product['description'] ?></p>
                                <p class="card-text"><?= $product['price'] ?>$</p>
                                <?php 
                                    if (!(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)) {
                                        echo "<a href='/product?id={$product['id']}' class='btn btn-primary'>Buy now</a>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>
<?php require 'components/script.php'?>