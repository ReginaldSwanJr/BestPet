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
    //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
  ?>  
</div>

<div class="body">
    <?php
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
    $datemd = substr($created, 5, 5);
    $datey = substr($created, 0, 4);
       
    $pet_id2 = $rows['1']['id'];
    $bestpet_name2 = $rows['1']['pet_name'];
    $image_src2 = $rows['1']['image'];
    $created2 = $rows['1']['created'];
    $date2md = substr($created2, 5, 5);
    $date2y = substr($created2, 0, 4);
      ?>
    <div class="container">
        <div class="card-deck">
            <div class="card rounded">
                <?php echo("<h3>" .$bestpet_name. "</h3>"); ?>
                <img class="card-img-top" id="pet" src='<?php echo($image_src); ?>' >
                <div class="card-body">
                </div>
                <div class="card-footer">
                <?php echo("<h6> Submitted on: " .$datemd."-".$datey. "</h6>"); ?>
                <form id="form1" action="vote.php" method="POST">
                    <input type="checkbox" name="rightpet" style="display:none">
                    <input type="hidden"  name="pet1_id" value="<?php echo $pet_id ?>" >
                    <input type="hidden"  name="pet2_id" value="<?php echo $pet_id2 ?>" >
                    <?php echo("<label for='pet1_textarea'>Comment </label>"); ?>
                    <textarea id="pet1" class="form-control" name="pet1_textarea" rows="3"></textarea>
                    <button type="submit" class="button btn btn-outline-secondary btn-lg btn-block" >Vote</button>
                    </form>
                </div>
            </div>
            <div class="card rounded">
                <?php echo("<h3>" .$bestpet_name2. "</h3>"); ?>
                <img class="card-img-top" id="pet" src='<?php echo($image_src2); ?>' >
                <div class="card-body">
                </div>    
                <div class="card-footer">
                    <?php echo("<h6> Submitted on: " .$date2md."-".$date2y. "</h6>"); ?>
                    <form id="form1" action="vote.php" method="POST">
                        <input type="checkbox" name="rightpet" style="display:none">
                        <input type="hidden"  name="pet1_id" value="<?php echo $pet_id ?>" >
                        <input type="hidden"  name="pet2_id" value="<?php echo $pet_id2 ?>" >
                        <?php echo("<label for='pet2_textarea'>Comment </label>"); ?>
                        <textarea id="pet2" class="form-control" name="pet2_textarea" rows="3"></textarea>
                        <button type="submit" class="button btn btn-outline-secondary btn-lg btn-block" >Vote</button>
                     </form>
                </div>
            </div>
            <div class="w-100"></div>
        </div>
    </div>
</div>
<?php
include('includes/footer.html');
?>