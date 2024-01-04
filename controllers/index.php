<?php
    require './database/db.php';
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $selectProducts = "SELECT * FROM  products WHERE product_name LIKE '%$search%' OR description LIKE '%$search%'";
    }else{
        $selectProducts = "SELECT * FROM products WHERE activation= 1";
    }
    $result = $conn->query($selectProducts);
    // Check if any records were found
    $resultData = [];
    
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $resultData[] = $row;
        }
    }else{

        // javascript injection
        
        $searchResult = htmlspecialchars($_GET['search']);
        
        // before fix
        $searchMessage = "No products found matching your search <span class='text-success fs-3'>&quot;{$_GET['search']}&quot;</span>.";

        // after fix
        //$searchMessage = "No products found matching your search <span class='text-success fs-3'>&quot;{$searchResult}&quot;</span>.";
    }
    
    // Close the connection
    $conn->close();
    $title = "Home page";
    require './views/index.php';
