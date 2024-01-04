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
            <th scope="col">Create date</th>
            <th scope="col">Update date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultData as $product): ?>
                <tr>
                    <th scope="row"><?= $product['id'] ?></th>
                    <td><?= $product['product_name'] ?></td>
                    <td>
                        <img src="/<?= $product['product_image']?>" alt="<?= $product['description'] ?>" width="40px" height="40px">  
                    </td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['create_at'] ?></td>
                    <td><?= $product['update_at'] ?></td>
                    <td>
                        <a class="btn btn-success" href="/administrator/back-up/products?id=<?= $product['id'] ?>">Bcak-up</a>
                        <a class="btn btn-danger" href="/administrator/back-up/products-delete?id=<?= $product['id'] ?>" >Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </tbody>
    </table>
  <?php endif; ?>

