<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();
require './config.php';
// Redirect the user to the login page or any other desired page
header("Location: http://".$host.":".$port."/");
?>