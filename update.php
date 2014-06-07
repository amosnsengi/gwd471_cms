<?php 
$page = 'about';
$page_id="update";

require_once('../../..config.php');
require_once('../includes/top.php');

//catch user selection from dropdown and sanitize 
$tmp = @$_GET['p'];
if($tmp === 'home' || $tmp === 'about' || $tmp === 'contact')
{
  $page = $tmp;
}
else
{
  $page = 'home';
}

/*Get all content related to the selected page
$sql = "SELECT
FROM site_content
WHERE page_name='$page'";

$myData = $db->query($sql);

//Create container for each piece of data
while($row = $myData fetch_assoc())
{
  if($row['section_name'] === 'blurb')
  {
    $blurb = $row['content'];
}
  
  if($row['section_name'] === 'intro')
  {
    $intro = $row['content'];
}*/
  
  if(isset($_POST['submitted']))
    {
    $user_blurb = mysqli_real_escape_string($db, $POST['body']);
    $user_intro = mysqli_real_escape_string($db, $POST['intro']);
    $page= mysqli_real_escape_string($db, $POST['tmp']);
    
    $sql1 = "UPDATE site_content
    SET content ='$user_blurb'
    WHERE page_name = '$page'
    AND section_name='blurb'";
    
    $myData = $db->query($sql1);
    
    $sql2 = "UPDATE site_content
    SET content ='$user_intro'
    WHERE page_name = '$page'
    AND section_name='intro'";
    
    $myData = $db->query($sql2);
    mysqli_close($db);
    header('location: ../'); //reroute the page
  }
?>

<link ref="stylesheet" href="../css/main.css" />
<h1>Update Page</h1>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset>
      <legend>Update Page Info</legend>
      <input type="hidden" id="tmp" name="tmp" value="<?php echo $page ?>" />
      <select id="page" onchange="set_page(this)">
        <option value="" id="">Choose a Page to edit</option>
        <option value="home" id="home">Home</option>
        <option value="product" id="product">Product</option>
        <option value="contact" id="contact">Contact</option>
      </select>
      
     <lebel for="intro">Intro</lebel>
 <textarea name="intro" row="10" columns="30"></textarea><?php echo $intro; ?>

<lebel for="body">body</lebel>
<textarea name="body" row="10" columns="30"></textarea><?php echo $blurb; ?>
      
<input type="submit" name="submitted" value="updated now"> 
      
    </fieldset>
</form>

<script>
  window.onload = function(){
    document.getElementById("<?php echo $page; ?>").selected = "selected";
  }
  
  function set_page(obj){
    window.location = './update.php?p=' + obj.value;
  }
</script>

<?php require_once('../includes/footer.php');?>

        

