<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/layouts/header.php"); ?>

    <section id="mainContent"> 
         
        <!-- Blog title -->
        <h1>Назначить поездку</h1>
      <div id="bannerImage"><img src="images/mycode1000x300.jpg" alt=""/></div>
      
		
    <h2>Введите данные</h2>
	
	<form action="/action_page.php">
        <label for="date_begin">Дата выезда:</label>
        <input type="date" id="date_begin" name="date_begin">
		<br><br>
		<label for="cars">Choose a region</label> 
		 <select id="cars" name="cars">
			<option value="volvo">SPB</option>
			<option value="saab">Moscow</option>
			<option value="fiat">Kovrov</option>
			<option value="audi">Ufa</option>
		 </select>
		 <br><br>
		 <label for="cars">Choose a courier</label> 
		 <select id="cars" name="cars">
			<option value="volvo">Мышкин</option>
			<option value="saab">Львович</option>
			<option value="fiat">Доусон</option>
			<option value="audi">Джон До</option>
		 </select>
		 <br><br>
		 <p><small>Дата возвращения: 23-02-2021</small></p>	
		
        <input type="submit" value="Назначить поездку">
    </form>
	<br>      

    </section>
    
<?php include("includes/layouts/sidebar.php"); ?>
<?php include("includes/layouts/footer.php"); ?>
</body>
</html>