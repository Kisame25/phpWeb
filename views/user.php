<?php require 'components/Header.php' ?>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">WEB-PHP</a>
        </div>
    </nav>
    <main class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-6">
                <div class="fw-bold fs-1 m-3">
                    Profile
                    <i class='fa-solid fa-user fs-1 text-center'></i>
                </div>
                <form method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <label for="email" class="form-label ">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= $user['email'] ?>" disabled>
                    <label for="username" class="form-label ">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="<?= $user['username'] ?>" disabled>
                    <label for="password" class="form-label ">Password</label>
                    <input type="password" id="password" name="password" class="form-control" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" required>
                    <label for="new-password" class="form-label ">New-Password</label>
                    <input type="password" id="new-password" name="new-password" class="form-control" value="<?php echo isset($_POST['re-password']) ? htmlspecialchars($_POST['re-password']) : ''; ?>" required>
                    <div class="text-danger">
                        <?= $message ?>
                    </div> 
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </main>
<?php require 'components/script.php'?>