<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card" style="width: 18rem;">
                <a href="/product?id=<?= $product['id'] ?>">
                    <img src="/<?= $product['product_image'] ?>" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title "><?= $product['product_name'] ?></h5>
                    <p class="card-text"><?= $product['description'] ?></p>
                    <p class="card-text"><?= $product['price'] ?>$</p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <form method="POST">
                <label for="product_name" class="form-label fw-bold">Product name</label>
                <input type="text" id="product_name" name="product_name" class="form-control" value="<?= $product['product_name'] ?>" required>
                <label for="photo"class="form-label fw-bold">Photo</label>
                <?= $product['product_image'] ?>
                <input type="file" id="photo" name="photo" class="form-control" value="<?= $product['product_image'] ?>" required>
                <label for="product_name" class="form-label fw-bold">Price</label>
                <input type="text" id="price" name="price" class="form-control" value="<?= $product['price'] ?>" required>
                <label for="description" class="form-label fw-bold" >Descrioption</label>
                <textarea name="description" id="description" cols="49" rows="2" required><?= $product['description'] ?></textarea>
                <label for="product_name" class="form-label fw-bold">Activation</label>
                <select class="form-select w-25" name="activation" aria-label="Default select example">
                    <option value="1">yes</option>
                    <option value="0">no</option>
                </select>
                <button class="btn btn-primary mt-3" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>