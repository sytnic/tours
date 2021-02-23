<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/layouts/header.php"); ?>
<?php 

    if (isset($_POST['submit'])) {
		// form was submitted
		$choose_date = $_POST['choose_date'];
        $unix_choose_date = strtotime($choose_date);
        
		// debug
		echo $unix_choose_date;    // may be bool(false)
        //var_dump($choose_date);  // may be string(0) "" (empty, you know)
		
		if ($unix_choose_date) {
		
			// 2. Perform database query
			$query = "SELECT * FROM travels WHERE date_begin_unix <= {$unix_choose_date} AND date_end_unix >= {$unix_choose_date} ORDER BY date_begin_unix ASC";
			
			$travel_set = mysqli_query($connection, $query);
			// $set == resource
			// Test if there was a query error
			if (!$travel_set) {
				die("Database query failed.");
			} 	
		
		}
		
	} else {	

	}
?>
    <section id="mainContent"> 
         
        <!-- Blog title -->
        <h1>Посмотреть поездки</h1>
      <div id="bannerImage"><img src="images/mycode1000x300.jpg" alt=""/></div>
      
		
    <h2>Form Read</h2>
	
	<form action="form_read.php" method="post">
        <label for="choose_date">Выберите дату:</label>
        <input type="date" id="choose_date" name="choose_date">
        <input type="submit" value="Проверить дату" name="submit">
		<small><strong>
		<?php 
			if  (isset($unix_choose_date) && $unix_choose_date) {
         		echo strftime("На дату %d.%m.%y", $unix_choose_date); 
		    }
		?></strong></small>
    </form>
	<br>
<!-- table example	
	<table style="width:100%">
	  <tr>
		<th>Full name</th>
		<th>Поездки в </th> 
		<th>Дата начала</th>
		<th>Дата приезда</th>
	  </tr>
	  <tr>
		<td>Jill Smith</td>
		<td>SPB</td>
		<td>21-02-2021</td>
		<td>21-02-2021</td>
	  </tr>	  
	</table>
-->
    <table style="width:100%">	
      <tr>
		<th>Полное имя</th>
		<th>Поездка в </th> 
		<th>Дата отъезда</th>
		<th>Дата приезда</th>
	  </tr>	  	 
	  
<?php
     if (isset($travel_set)) {
       while($row = mysqli_fetch_assoc($travel_set)) {
	    // outout data from each row
?>       <tr>
	      <td>
		<?php 
		    $courier_id = $row["id_courier"];
		    $courier = find_courier_by_id($courier_id);
		    echo $courier["full_name"]." (".$row["id_courier"].")"; 
		?></td>
		
		<td>
		<?php 
		    $region_id = $row["id_region"];
		    $region = find_region_by_id($region_id);
		    echo $region["region"]." (".$row["id_region"].")"; 
		?></td>  		  
	     
        <td>
		<?php 
		    $unix_from_db = $row["date_begin_unix"];
		    $string_date = unix_to_date($unix_from_db);
		    echo $string_date; 
		?></td>
		 
	    <td>
		<?php 
		    $unix_from_db = $row["date_end_unix"];
		    $string_date = unix_to_date($unix_from_db);
		    echo $string_date; 
		?></td>		
	     
		 </tr> 
<?php    
        }	
	 }
?>
	    
	</table>	
      

    </section>
    
<?php include("includes/layouts/sidebar.php"); ?>
<?php include("includes/layouts/footer.php"); ?>
</body>
</html>