<?php require 'components/Header.php' ?>

<body>
    <?php require 'components/Nav.php' ?>
    <main class="m-4">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="m-3 fw-bold fs-1">Product</div>
                        <div class="card" style="width: 18rem;">
                            <a href="/product?id=<?= $product['id'] ?>"><img src="<?= $product['product_image'] ?>" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title "><?= $product['product_name'] ?></h5>
                                <p class="card-text"><?= $product['description'] ?></p>
                                <p class="card-text"><?= $product['price'] ?>$</p>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $quantity = 0;
                        if(!(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)){
                            echo "<div class='col-6'> <div class='text-center fw-bold fs-1 m-3'>Buy</div>
                            <form method='POST'>
                                <label for='username' class='form-label'>Username</label>
                                <input type='text' id='username' name='username' class='form-control' required>
                                <label for='email' class='form-label'>Email</label>
                                <input type='email' id='email' name='email' class='form-control' required>
                                <label for='address' class='form-label'>address</label>
                                <input type='text' id='address' name='address' class='form-control' required>
                                <div class='container-full'> 
                                    <div class='row'>
                                        <div class='col-6'>
                                            <label for='quantity' class='form-label'>Quantity</label>
                                            <input type='number' name='quantity' id='quantity'value=1 class='form-control' required>
                                        </div>
                                        <div class='col-6'>
                                            <label for='payment' class='form-label'>Payment method</label>
                                            <select class='form-select' id='payment' name='payment' aria-label='Default select example'>
                                                <option value='ABA'>ABA</option> 
                                                <option value='WING'>Wing</option> 
                                                <option value='Pay pal'>Pay pal</option> 
                                            </select> 
                                        </div> 
                                    </div> 
                                </div>
                                <input type='hidden' name='user_id' value='{$_SESSION['id']}'>
                                <div class='d-flex'>
                                    <a href='/' class='me-5 mt-4 btn btn-danger'>Cancel</a>
                                    <button class='ms-5 mt-4 btn btn-primary w-75' type='submit'>Buy</button>
                                </div>
                                
                            </form>
                        </div>";

                            }else{
                                echo "<div class='col-6'>
                                            <h5 class='me-5 fw-bold position-absolute top-50 start-50 translate-middle'>You need to login first to by this product</h5>
                                        </div>";
                            }
                        ?>
                    
                </div>
            </div>
        </div>
    </main>
    <script src="../../js/script.js"></script>
<?php require 'components/script.php'?>