<?php require 'components/Header.php' ?>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">WEB-PHP</a>
        </div>
    </nav>
    <main class="container">
    <div class="fw-bold fs-2 text-center mt-4">Welcome to administrator page</div>
    <div class="fw-bold fs-2 text-center mt-4">Please enter the <span  class="text-success">secret key</span> to access the administrator dashboard</div>
        <form method="POST" class="position-absolute top-50 start-50 translate-middle w-25 shadow p-3 rounded --bs-border-color mt-5">
            <label for="secret-key" class="form-label text-center">Enter key</label>
            <input type="text" class="form-control" id="secret-key" name="key">
            <p class="text-danger mt-2"><?= $message ?></p>
            <button class="btn btn-primary mt-3" type="submit">Enter</button>
            <?php $secret_key = mt_rand(1000, 9999); ?>
            <input type="hidden" name="secret_key" value="<?= $secret_key ?>">
            <div class="text-light text-center"><?= $secret_key ?></div>
        </form>
    </main>
<?php require 'components/script.php'?>