<?php # Script 3.7 - index.php #2
session_start();
$page_title = 'BestPet';
if(isset($_SESSION['token'])) {
    include('includes/header_in.html');
}else{
    include('includes/header.html');
}
include("config.php");
// Call the function:

?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js">
        $("#pet1").on("input", function(){
	        $("#pet22").val($(this).val());
        });
</script>
    
<div class="collapse" id="bestest">
  <?php 
    include('includes/bestpets.php');
  ?>  
</div>

<div class="body">
    <div>
      <?php
    //   if(isset($_SESSION['token'])) {
    //   echo("Session started") ;
    //   echo('</br> <span> Session ID: </span>');
    //   echo session_id();
    //   echo('</br>');
    //   echo('<p><b>Name:</b> '.$_SESSION['userData']['first_name'].' '.$_SESSION['userData']['last_name'].'</p>');
    //   echo($_SESSION['userData']['id']);
    //   }
      
      //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
      
      
      // pull two random images
       $rows = array();
       //$sql = "select image from pets where owner_id=$id";
       $sql = "SELECT id,pet_name,image,created FROM pets ORDER BY RAND( ) LIMIT 2 ";
       $result = mysqli_query($dbc,$sql);
       while($row = mysqli_fetch_array($result)){ $rows[] = $row;}
       //print_r($rows);
       
       $pet_id = $rows['0']['id'];
       $bestpet_name = $rows['0']['pet_name'];
       $image_src = $rows['0']['image'];
       $created = $rows['0']['created'];
       
       $pet_id2 = $rows['1']['id'];
       $bestpet_name2 = $rows['1']['pet_name'];
       $image_src2 = $rows['1']['image'];
       $created2 = $rows['0']['created'];
       
      ?>
    </div>
    
 
    <div class="container">
      <div class="row">
        <div class="col">
            <div class="card rounded" style="width: 30rem;">
              <?php echo("<h5> Pet 1 Name: " .$bestpet_name. "</h5>"); ?>
              <img class="card-img-top" src='<?php echo($image_src); ?>' >
              <div class="card-body">
              <?php echo("<h6> Submitted on: " .$created. "</h6>"); ?>
              <form id="form1" action="vote.php" method="POST">
                  <input type="checkbox" name="rightpet" style="display:none">
                  <input type="hidden"  name="pet1_id" value="<?php echo $pet_id ?>" >
                  <input type="hidden"  name="pet2_id" value="<?php echo $pet_id2 ?>" >
                  <?php echo("<label for='pet1_textarea'>Comment </label>"); ?>
                  <textarea id="pet1" class="form-control" name="pet1_textarea" rows="3"></textarea>
                  <!--<textarea id="pet11" class="form-control" name="pet11_textarea" rows="3"></textarea>-->
                  <button type="submit" class="button btn btn-outline-secondary btn-lg btn-block" >Vote</button>
              </form>

              </div>    
            </div>
        </div>
        <div class="col">
            <div class="card rounded" style="width: 30rem;">
              <?php echo("<h5> Pet 2 Name: " .$bestpet_name2. "</h5>"); ?>
              <img class="card-img-top" style="max-height: 600px;" src='<?php echo($image_src2); ?>' >
              <div class="card-body">
              <?php echo("<h6> Submitted on: " .$created2. "</h6>"); ?>
              <form id="form2" action="vote.php" method="POST">
                   <input type="checkbox" name="rightpet" style="display:none" checked>
                   <input type="hidden"  name="pet1_id" value="<?php echo $pet_id ?>" >
                   <input type="hidden"  name="pet2_id" value="<?php echo $pet_id2 ?>" >
                   <?php echo("<label for='pet2_textarea'>Comment </label>"); ?>
                   <textarea id="pet2" class="form-control" name="pet2_textarea" rows="3"></textarea>
                   <!--<textarea id="pet22" class="form-control" name="pet22_textarea" rows="3"></textarea>-->
                   <button type="submit" class="button btn btn-outline-secondary btn-lg btn-block" >Vote</button>
              </form>
              </div>
            </div>
        </div>
        <div class="w-100"></div>
      </div>
    </div>
</div>
<?php
include('includes/footer.html');
?>