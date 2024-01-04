<?php require 'components/Header.php' ?>

<body>
    <div class="position-absolute top-50 start-50 translate-middle shadow p-3 rounded w-25">
        <h3 class="fw-bold text-center">SignUP</h3>
        <form method="POST">
            <label for="email" class="form-label ">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
            <label for="username" class="form-label ">Username</label>
            <input type="text" id="username" name="username" class="form-control" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
            <label for="password" class="form-label ">Password</label>
            <input type="password" id="password" name="password" class="form-control" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" required>
            <label for="re-password" class="form-label ">Re-Password</label>
            <input type="password" id="re-password" name="re-password" class="form-control" value="<?php echo isset($_POST['re-password']) ? htmlspecialchars($_POST['re-password']) : ''; ?>" required>
            <div class="text-danger"><?= $message ?></div>
            <button type="submit" class="btn btn-primary mt-3">Sign up</button>
        </form>
        <div class="mt-2 text-center">        
            <a href="login" class="link-underline link-underline-opacity-0">Login</a>
        </div>
    </div>

<?php require 'components/script.php'?>