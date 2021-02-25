<?php require_once("includes/db_connection.php"); ?>
<?php
$q = intval($_GET['q']);



$sql="SELECT * FROM regions WHERE id = '".$q."'";
$result = mysqli_query($connection,$sql);


if($row = mysqli_fetch_array($result)) {  
  echo $row['spent_days']; 
}

mysqli_close($connection);
?>