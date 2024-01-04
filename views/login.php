<?php 
    require 'components/Header.php';
?>
<body>
    <div class="position-absolute top-50 start-50 translate-middle shadow p-3 rounded w-25">
        <h3 class="fw-bold text-center">Login</h3>
        <form method="POST">
            <label for="username" class="form-label ">Username</label>
            <input type="text" id="username" name="username" class="form-control" required>
            <label for="password" class="form-label ">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
            <p class="text-danger"><?php echo $isMessage ?></p>
            <button type="submit" name="Login" class="btn btn-primary mt-3">Login</button>
        </form>
        <div class="mt-2 text-center">        
            <a href="/signup" class="link-underline link-underline-opacity-0">SignUP</a>
        </div>
    </div>
<?php require 'components/script.php'?>