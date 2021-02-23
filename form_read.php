<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/layouts/header.php"); ?>

    <section id="mainContent"> 
         
        <!-- Blog title -->
        <h1>Посмотреть поездки</h1>
      <div id="bannerImage"><img src="images/mycode1000x300.jpg" alt=""/></div>
      
		
    <h2>Form Read</h2>
	
	<form action="/action_page.php">
        <label for="choose_date">Выберите дату:</label>
        <input type="date" id="choose_date" name="choose_date">
        <input type="submit" value="Проверить дату">
    </form>
	<br>
	
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
  <tr>
    <td>Eve Jackson</td>
    <td>Moscow</td>
    <td>21-02-2021</td>
	<td>21-02-2021</td>
  </tr>
  <tr>
    <td>John Doe</td>
    <td>Ufa</td>
    <td>21-02-2021</td>
	<td>21-02-2021</td>
  </tr>
</table>
   
	  
		
      

    </section>
    
<?php include("includes/layouts/sidebar.php"); ?>
<?php include("includes/layouts/footer.php"); ?>
</body>
</html>