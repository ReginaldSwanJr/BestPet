<?php
 session_start();
 $page_title = 'Welcome to this Site!';
 
 if(isset($_SESSION['token'])) {
     include('includes/header_in.html');
 }else{
     include('includes/header.html');
 }
 ?>
 <div class="collapse" id="bestest">
  <?php 
    include('includes/bestpets.php');
  ?>  
</div>

 <?php
 include("config.php");
 
 $imagerows = array();
 $commentrows = array();
 $uid = $user_id = $_SESSION['userData']['id'];
 $sql1 = "select image, id from pets where owner_id=$uid";
 $images = mysqli_query($dbc,$sql1);
 $i = 0;
 //$row = mysqli_fetch_array($result);
 while($imagerow = mysqli_fetch_array($images)){ $imagerows[] = $imagerow;}
 
?>
<div class='row align-items-center'>
<?php
foreach ($imagerows as list($image, $pid)) {
    if( $i % 3 == 0 ) {
     echo("<div class='w-100'></div>");
    }
    echo("<div class='col-md' style='background-color:white';><img class='card-img-top' src=".$image.">");
    $sql2 = "select body from comments where pet_id=$pid";
    $comments = mysqli_query($dbc,$sql2);
    while($commentrow = mysqli_fetch_array($comments)){ $commentrows[] = $commentrow;}
    foreach ($commentrows as list($comment)){
     echo("<p style='background-color:white;'>".$comment."</p>");
    }
    $commentrows = [];
    echo("</div>");
    $i++;
}
?>
</div>
<?php
include('includes/footer.html');
?>


