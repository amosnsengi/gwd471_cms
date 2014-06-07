<style>
  body {
  background:url(images/photography.png) repeat;
  }
  section {
    width:60%;
    margin-left:auto;
    margin-right:auto;
    border-radius:10%;
    border: solid 3px #333;
    padding-left:40px;
  }
  </style> 

  <?php $page_id = 'about'; ?>
  <?php require_once('../../config.php'); ?>
  <?php 
    //interact with DB
    $sql = 'SELECT * From widgets';
    
    //send command to MySQL
    $myData = $db->query($sql)
    OR exit('unable to select data from table');

    //close DB connection
    $db->close();
  ?>

  <?php require_once('includes/top.php'); ?>
  <?php require_once('includes/header.php'); ?>
  
    <section>
    	<h2>About</h2>
        <?php 
          echo '<div id="products">';
          while($row = $myData->fetch_assoc())
          {
            echo '<div class="product">';
            echo '<img src="" alt="" />';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<p>$' . $row['price'] . '</p>';
            echo '</div>';
          }
           echo '<br class="clear" />';
           echo '</div>';
        ?>
        
      
     
   </section>
<!--
  <div id="boxes">
   
  </div>
  
  <div id="box">
  </div>

  <div id="bo">
  </div>

  <ul class="pricing-table">
    <li class="title">Standard</li>
    <li class="price">$50.00</li>
    <li class="bullet-item">100 gb Database</li>
    <li class="cta-button"><a class="button" href="#">Buy Now</a></li>
  </ul>

  <ul id="pricing-tables">
    <li class="title">Advanced</li>
    <li class="price">$100.00</li>
    <li class="bullet-item">500 gb Database</li>
    <li class="cta-button"><a class="button" href="#">Buy Now</a></li>
  </ul>

  <ul id="pricing-tabless">
    <li class="title">Premium</li>
    <li class="price">$150.00</li>
    <li class="bullet-item">1000 gb Database</li>
    <li class="cta-button"><a class="button" href="#">Buy Now</a></li>
  </ul>
-->
 

  <?php require_once('includes/footer.php'); ?>
   
</body>
</html>