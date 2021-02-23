   
    <footer>    
	
      <article>
        <h3>Github</h3>
        <p>github.com/sytnic</p>
      </article>
      <article>
        <h3>Bitbucket</h3>
        <p>bitbucket.org/sytnic</p>
      </article>
    </footer>
  </div> <!-- the end <div id="content">  -->
  <div id="footerbar"><!-- Small footerbar at the bottom --></div>
</div> <!-- the end <div id="mainwrapper">  -->

<?php
  // 5. Close database connection
  if (isset($connection)){
	  mysqli_close($connection);
	}  
?>