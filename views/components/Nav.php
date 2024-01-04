<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/">WEB-PHP</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ps-1">
          <a class="nav-link <?= IsUrl('/')? 'active-nav':'hover-nav'?> " href="/">Home</a>
        </li>
        <li class="nav-item ps-1">
          <a class="nav-link <?= IsUrl('/about')? 'active-nav':'hover-nav'?>" href="/about">About</a>
        </li>
        <li class="nav-item ps-1">
          <a class="nav-link <?= IsUrl('/contact')? 'active-nav':'hover-nav'?>" href="/contact">Contact</a>
        </li>
      </ul>
      <?php 
        // Start session
        session_start();
        // Check if the user is not logged in
        
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true ){
          echo '<div class="d-flex" role="search">
                  <a href="/login" class="btn btn-primary me-2">Login</a>
                  <a href="/signup" class="btn btn-success me-2">SignUp</a>
                </div>';
        }else{
          $isAdmin = isset($_SESSION['admin'])?"
        <li><a class='dropdown-item' href='/administrator'>Admin dashboard</a></li>
        <li><a class='dropdown-item' href='/administrator/products-add'>Add Product</a></li>"
        :
         "<li><a class='dropdown-item' href='/order?id={$_SESSION['id']}'>Orders</a></li>";
        
          echo "<div class='dropstart me-2 d-flex'>
                  <a class='btn btn-secondary dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    <i class='fa-solid fa-user fs-5'></i>
                  </a>
                  <ul class='dropdown-menu width-20'>
                    <li><a class='dropdown-item' href='/user?id={$_SESSION['id']}'>{$_SESSION['username']}</a></li>
                    {$isAdmin}
                    <li><a class='dropdown-item' href='/logout'>Log out</a></li>
                  </ul>
                </div>"; 
        }
      ?>
    </div>
  </div>
</nav>