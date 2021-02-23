<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/layouts/header.php"); ?>
<?php if (isset($_GET['id'])){
    $id = $_GET['id']; 
} else {
    echo '<p>Ничего не обнаружено. </p>';
    $id = '';
    
} 
?>  
    <section id="mainContent">     
     
<?php   $query  = "SELECT * ";
		$query .= " FROM pages ";
		$query .= " WHERE id = $id "; 
		$page_set = mysqli_query($connection, $query);
		// Test if there was a query error
		confirm_query($page_set);		
        
		if($row = mysqli_fetch_assoc($page_set)) {
            echo '<h1>';
            echo htmlentities($row['number']);
            echo '&nbsp;';
            echo htmlentities($row['title']);
            echo '</h1>';
            
            echo '<div>';
            echo $row['content'];
            echo '</div>';
        }
?>    

    <?php include("includes/layouts/authorinfo.php"); ?>
    </section>
    
<?php include("includes/layouts/sidebar.php"); ?>
<?php include("includes/layouts/footer.php"); ?>
</body>
</html>    