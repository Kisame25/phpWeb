<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body>
    <main class="container">
        <h3 class="fw-bold">Input New Product</h3>
        <div class="row mt-5">
            <div class="col-8">
                <form method="POST" class="shadow p-3 rounded">
                    <label for="product_name" class="form-label fw-bold">Product name</label>
                    <input type="text" id="product_name" name="product_name" class="form-control" required>
                    <label for="photo" class="form-label fw-bold">Photo</label>
                    <input type="file" id="photo" name="photo" class="form-control" required>
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="number" id="price" name="price" class="form-control" required>
                    <label for="description" class="form-label fw-bold">Descrioption</label>
                    <textarea class="form-control" name="description" id="description" cols="79" rows="2" required></textarea>
                    <label for="activation" class="form-label fw-bold">Activation</label>
                    <select class="form-select w-25" name="activation" aria-label="Default select example">
                        <option value="1">yes</option>
                        <option value="0">no</option>
                    </select>
                    <button class="btn btn-primary mt-3" type="submit">Add</button>
                </form>
            </div>
        </div>
    </main>
    <script>
        document.getElementById("price").addEventListener("input", function() {
            if (this.value === "0") {
            this.setCustomValidity("price cannot be 0");
            } else {
            this.setCustomValidity("");
            }
        });
    </script>
</body>

</html>