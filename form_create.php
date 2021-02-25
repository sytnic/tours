<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/layouts/header.php"); ?>

<script>
function showReg(str) {
  if (str=="") {
    document.getElementById("days").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("days").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","gettime.php?q="+str,true);
  xmlhttp.send();
}

function showDate(str) {
  if (str=="") {
    document.getElementById("date").innerHTML="";
    return;
  } else {
	  document.getElementById("date").innerHTML=str;
  }  
}
</script>

<?php
    if (isset($_POST['submit'])) {
		// Если отправлено, то обработка формы
		
		$date_begin_unix = strtotime($_POST["date_begin"]);	
		$id_courier = $_POST["courier"];
		$id_region = $_POST["region"];
		
        // переменная перезапишется ниже, если поля заполнялись		
        $message = "Не все поля были выбраны.<br><br>";	
        
		// проверка занятости курьера
		$busy_set = find_busy_courier_by_id($id_courier);
				
		$busy = false;
		
		if ($busy_set) { // usually there is always
			while ($busy_row = mysqli_fetch_assoc($busy_set)) {
			$exist_unix_begin = (int)$busy_row["date_begin_unix"];
			$exist_unix_end = (int)$busy_row["date_end_unix"];
			
			// debug, and check break;
			/*
			echo $exist_unix_begin;
			echo "<br>";
			echo $date_begin_unix; 
			echo "<br>"; 
			echo $exist_unix_end;
			echo "<br><br>";
			*/
				if (($exist_unix_begin <= $date_begin_unix) && ($date_begin_unix <= $exist_unix_end)) {
					$message = "Этот курьер занят в это время.<br><br>";
					$busy = true;	
                    break;				
				}
			}
		} else {	// if busy_set == null
           
		}
		
		var_dump ($busy); // debug
		
	    // если поля заполнялись и курьер не занят, то INSERT
		if ($id_courier && $id_region && $date_begin_unix && !$busy) {
			
			// counting the days spent
			$region_row = find_region_by_id($id_region);
			if ($region_row) {
				$spent_days = $region_row["spent_days"];
				$spent_unix = $spent_days*60*60*24; // xx*min*hour*day
			}
			
            $date_end_unix = $date_begin_unix + $spent_unix;
		
			$query  = "INSERT INTO travels (" ;
			$query .= "  id_courier, id_region, date_begin_unix, date_end_unix" ;
			$query .= ") VALUES (" ;
			$query .= "  {$id_courier}, {$id_region}, {$date_begin_unix}, {$date_end_unix} ";
			$query .= ")";            
						
			$result = mysqli_query($connection, $query);

			if ($result) {
				// Success
				$message = "Запись создана.<br><br>";	
			} else {
				// Failure
				$message = "Запись не создана.<br><br>";			
			}
        }

    } else {	
        $message = "";
	}		
		
?>


    <section id="mainContent"> 
         
        <!-- Blog title -->
        <h1>Назначить поездку</h1>
<?php include("includes/layouts/banner.php"); ?>  
      
		
    <h2>Введите данные</h2>
	<?php  echo $message; ?>
	
	<form action="form_create.php" method="post">
        <label for="date_begin">Дата выезда:</label>
        <input type="date" id="date_begin" name="date_begin" onchange="showDate(this.value)">
		<br><br>
		<label for="region">Choose a region</label> 
		 <select id="region" name="region" onchange="showReg(this.value)">
		    <option value="">Выберите регион</option>
<!-- example
        <option value="1">SPB</option>
		<option value="2">Moscow</option>
-->		 
<?php   

		$regions_set = find_all_regions();
		if (isset($regions_set)) {
            while($region = mysqli_fetch_assoc($regions_set)) {
	        // output data from each row
?>              <option value="<?php  echo $region["id"];  ?>">
					<?php echo htmlentities($region["region"]);  ?>					
				</option>
<?php       }                                   ?>		 
<?php       mysqli_free_result($regions_set);	?>
<?php   }                                       ?>		
		 </select>
		 <br><br>
		 
		 <label for="courier">Choose a courier</label> 
		 <select id="courier" name="courier">
            <option value="">Выберите курьера</option>		 
<?php 
		$couriers_set = find_all_couriers();
		if (isset($couriers_set)) {
            while($row = mysqli_fetch_assoc($couriers_set)) {
	        // output data from each row
?>              <option value="<?php  echo $row["id"];  ?>">
					<?php echo htmlentities($row["full_name"]);  ?>
				</option>
<?php       }                                   ?>		 
<?php       mysqli_free_result($couriers_set);	?>
<?php   }                                       ?>		
		 
		 </select>
		 <br><br>
		 <label for="fname">Дата возвращения:</label><br>
		 
		
		<br><br>
        <input type="submit" name="submit" value="Назначить поездку">
    </form>
	<br>
	
   <p>Будет затрачено дней: </p>	
   <div id="days"><b> количество дней...</b></div>
   <p>Выбранная дата: </p>	
   <div id="date"><b> дата..</b></div>
   
   <p>Конечная дата: </p>	
   <div id="count" ><b> дата..</b></div>
  
    </section>
    
<?php include("includes/layouts/sidebar.php"); ?>
<?php include("includes/layouts/footer.php"); ?>
</body>
</html>