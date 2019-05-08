<?php 
include("config.php");
 
 $rows = array();
 $id = $user_id = $_SESSION['userData']['id'];
 //$sql = "select image from pets order by score DESC limit 5";
 $sql = "select image, pet_name from pets order by score DESC limit 5";
 $result = mysqli_query($dbc,$sql);
 //$row = mysqli_fetch_array($result);
 while($row = mysqli_fetch_array($result)){ $rows[] = $row;}
 
//echo("<div class='page-header'><h3>Most Popular Pets</h3></div>");
echo("<div class='d-flex flex-row pre-scrollable' id='bestest'>");
$number = 0;
foreach ($rows as list($a, $b)) {
    // $a contains the first element of the nested array,
    // and $b contains the second element.
    //echo "A: $a; B: $b\n";
    //echo("<img style='width:500px;height:600px;' src=".$a.">\n");
    $number ++;
    echo("<div class='fakeimg p-5' id='bestest1'>
    <h4>#$number $b</h4>
    <img style='width:200px;height:200px;' src=".$a."></div>");}
echo("</div>");
?>


  
    
