<?php
	define ("DB_SERVER", "localhost");
	define ("DB_USER", "insta_user");
	define ("DB_PASS", "secretpwd");
	define ("DB_NAME", "insta_db");
    
  // 1. Create a database connection
    
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  
  // Test if connection unsucceeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>