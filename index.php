<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/layouts/header.php"); ?>

    <section id="mainContent"> 
      <!--************************************************************************
    Main content starts here
    ****************************************************************************-->
      
        <!-- Blog title -->
        <h1>Добро пожаловать на сайт</h1>
      <div id="bannerImage"><img src="images/mycode1000x300.jpg" alt=""/></div>
      
		
    <h2>Формы поиска по курьерам и поездкам</h2>
    <p>Меню здесь и справа -->><p>
	<ul>
	  <li><a href="form_create.php" title="Link">Назначить поездку</a></li>	
      <li><a href="form_read.php" title="Link">Просмотр поездок</a></li>        
    </ul>
	  
		
      
<?php include("includes/layouts/authorinfo.php"); ?>
    </section>
    
<?php include("includes/layouts/sidebar.php"); ?>
<?php include("includes/layouts/footer.php"); ?>
</body>
</html>