  
  <?php require_once('../../config.php'); ?><!--log into the database-->
  <?php $page_id = 'home'; ?>

  <?php
    $sql= "
      SELECT * 
      FROM site_content
      WHERE page_name='home'";

      $myData = $db->query($sql);

      //create container for each piece of data
      while($row = $myData->fetch_assoc())
      {
        if($row['section_name'] ==='blurb')
          {
          $blurb = $row['content'];
          }

        if($row['section_name'] ==='intro')
          {
          $intro = $row['content'];
          }
  }
  ?>

  <?php require_once('includes/top.php'); ?>
  <?php require_once('includes/header.php'); ?>

  <style>
  body {
  background:url(images/photography.png) repeat;
  }
  section {
    width:74%;
    margin-left:auto;
    margin-right:auto;
  }
  </style>
  
    <section>
      <?php require_once('includes/body.php'); ?>
    	
    </section>
   
  <?php require_once('includes/footer.php'); ?>
   
</body>
</html>