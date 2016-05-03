<?php
	define("DB_SERVER", "172.21.200.37");
	define("DB_USER", "2degrees");
	define("DB_PASS", "2deg12345");
	define("DB_NAME", "ranPU");

  // 1. Create a database connection
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
