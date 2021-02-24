<!DOCTYPE html>
<html>
<head>
    <title>Date and Times: Formatting</title>
</head>
<body>
    <?php
	    $timestamp = 1612213200;
		echo "<br>". $timestamp."<br>" ;
		echo strftime("%d-%m-%y", $timestamp);
		echo "<br />";
		
		$unix_timestamp = strtotime("2019-06-01");			
		echo $unix_timestamp."<br>";
	
	
	   echo "<hr>";
		
		// for MySQL
		
		$dt = time();  // now
		
		// 2021-02-22 13:49:19
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		echo $mysql_datetime;
		echo "<br>";
		
		// 2021-02-22 
		$mysql_date = strftime("%Y-%m-%d", $dt);
		echo $mysql_date;
	  
	?>
</body>
</html> 