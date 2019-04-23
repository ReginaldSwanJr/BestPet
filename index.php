<?php # Script 3.7 - index.php #2
session_start();
$page_title = 'Welcome to this Site!';
include('includes/header.html');
include("config.php");
// Call the function:

?>

<div class="collapse" id="bestest">
  <?php 
    include('includes/bestpets.php');
  ?>  
</div>

<div class="body">
    <div>
      <?php
      
      if(isset($_SESSION['token'])) {
       echo("Session started") ;
       echo('</br> <span> Session ID: </span>');
       echo session_id();
       echo('</br>');
       echo('<p><b>Name:</b> '.$_SESSION['userData']['first_name'].' '.$_SESSION['userData']['last_name'].'</p>');
       echo($_SESSION['userData']['id']);
      }
      
      //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
      
      
      // pull two random images
       $rows = array();
       //$sql = "select image from pets where owner_id=$id";
       $sql = "SELECT id,pet_name, image FROM pets ORDER BY RAND( ) LIMIT 2";
       $result = mysqli_query($dbc,$sql);
       while($row = mysqli_fetch_array($result)){ $rows[] = $row;}
       //print_r($rows);
       
       $pet_id = $rows['0']['id'];
       $bestpet_name = $rows['0']['pet_name'];
       $image_src = $rows['0']['image'];
       
       $pet_id2 = $rows['1']['id'];
       $bestpet_name2 = $rows['1']['pet_name'];
       $image_src2 = $rows['1']['image'];
       
      ?>
    </div>
  
    <div class="card rounded">
       
      <?php echo("<h5> Pet 1 Name: " .$bestpet_name. "</h5>"); ?>
      <h5>Submitted on: Dec 7, 2017 (CHANGE)</h5>
      <?php echo("<h5>Pet 1 id: " .$pet_id."</h5>"); ?>
      <img src='<?php echo($image_src); ?>' style="width:400px;height:400px;">
    </div>
    
    <div class="card rounded">
      <?php echo("<h5> Pet 2 Name: " .$bestpet_name2. "</h5>"); ?>
      <h5>Submitted on: Sep 2, 2017 (CHANGE)</h5>
      <?php echo("<h5>Pet 2 id: " .$pet_id2. "</h5>"); ?>
      <img src='<?php echo($image_src2); ?>' style="width:400px;height:400px;">
    </div>

</div>
<?php
// Call the function again:


include('includes/footer.html');
?>