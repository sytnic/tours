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
  
// $charset = mysqli_character_set_name($connection);
// printf ("Текущая кодировка - %s\n",$charset);

if (!mysqli_set_charset($connection, "utf8mb4")) {
   // printf("Ошибка при загрузке набора символов utf8mb4: %s\n", mysqli_error($connection));
    exit();
} else {
   // printf("Текущий набор символов: %s\n", mysqli_character_set_name($connection));
}  
  
?>