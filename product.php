  <?php $page_id = "products";?>
  <?php require_once('../../config.php');?>
  <?php 
    //INTERACT WITH DATABASE
    $sql = 'SELECT * FROM products';
    //SEND COMMAND TO MYSQL
    $myData = $db->query($sql)
      OR exit('Unable to select data from table.');
    
    //CLOSE DATABASE CONNECTION
    $db->close();
  ?>
  <?php require_once('top.php');?>
  
  <!-- START WRAPPER -->
  <div id="wrapper">
  
  <?php require_once('includes/header.php');?>
  <?php require_once('includes/nav.php');?>
  
  <!-- START MAIN CONTENT -->
  <div id="main-content">
    <h2>Products</h2>
    
    <?php
      echo '<div id="all-products">';
      while($row = $myData->fetch_assoc())
      {
        echo '<div class="single-product">';
        echo '<img src="" alt="" />';
        echo '<h3>' . $row['name'] . '</h3>';
        echo '<p>$' . $row['price'] . '</p>';
        echo '<p>' . $row['description'] . '</p>';
        echo '</div>';
      }
      echo '</div>';
    ?>
    
  </div>
  <!-- END MAIN CONTENT -->
  
  <?php require_once('includes/footer.php');?>